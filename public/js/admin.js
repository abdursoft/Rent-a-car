/****************************************
 * | All users functionality defined here
 ***************************************/


/********************
 * | Loading sppinner
 *******************/

async function spinner(container,color='danger'){
    $(container).html(`<div class="d-flex align-items-center justify-content-center"><div class="spinner-border text-${color}" role="status"><span class="sr-only"></span></div></div>`);
}

/************************
 * | Admin login function
 ***********************/
async function adminLogin() {
    await spinner('.errorMsg');
    axios.post('/signin',$("#loginForm").serialize())
    .then((response) => {
        if(response.status === 200){
            messageRender(response.data.message, 'green', 'success');
            window.location.href='/admin/dashboard'
        }else{
            messageRender(response.data.message, 'red');
        }
        $(".errorMsg").empty();
    }).catch((error) => {
        $(".errorMsg").empty();
        messageRender(error.response.data.message, 'red');
    })
}



/***********************
 * | Admin Car Operation
 **********************/
async function addCar() {
    await spinner('.errorMsg');
    var myForm = document.getElementById('carForm');
    axios.post('/admin/car/add', new FormData(myForm))
    .then(async (response) => {
        if(response.status === 201){
            messageRender(response.data.message, 'green', 'success');
            $("#carForm")[0].reset();
            $("#carAddModal").modal('hide');
            await destroyTable("#carTable");
            await getCars();
        }else{
            messageRender(response.data.message, 'red');
        }
        $(".errorMsg").empty();
    }).catch((error) => {
        $(".errorMsg").empty();
        messageRender(error.response.data.error, 'red');
    })
}

async function openAddCar() {
    $("#carAddModal").modal('show');
}

async function goBack() {
    history.back();
}


async function renderTable(container) {
    new DataTable(container ,{
        layout: {
            topStart: {
                buttons: ['excelHtml5', 'csvHtml5', 'pdfHtml5']
            }
        }
    })
        
}

async function destroyTable(container) {
    $(container).DataTable().destroy();
}

async function getCars() {
    axios.get('/admin/car/get')
    .then(async (response) => {
        if(response.status === 200){
            let cars = response.data;
            $("#carBody").empty();
            $(cars).each((index,item) => {
                $("#carBody").append(`
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.brand}</td>
                        <td>${item.model}</td>
                        <td>${item.year}</td>
                        <td>${item.availability === 1 ? 'Available' : 'Not Available'}</td>
                        <td>${item.daily_rent_price}</td>
                        <td class='text-end'>
                            <button class='btn btn-outline-success' onClick="carEdit('${item.id}')">Edit</button>
                            <a href="/admin/car/analytics/${item.id}"><button class='btn btn-outline-primary'>Analytics</button></a>
                            <button class='btn btn-outline-danger' onClick="carDelete('${item.id}')" >Delete</button>
                        </td>
                    </tr>    
                `);
            });
            await renderTable('#carTable');
        }else{
            messageRender(response.data.message, 'red');
        }
        $(".errorMsg").empty();
    }).catch((error) => {
        $(".errorMsg").empty();
        messageRender(error.response.data.message, 'red');
    })
}

async function editCar() {
    await spinner('.errorMsg');
    var myForm = document.getElementById('carForm');
    axios.post('/admin/car/edit', new FormData(myForm))
    .then(async (response) => {
        if(response.status === 200){
            messageRender(response.data.message, 'green', 'success');
            $(myForm)[0].reset();
            $("#carEditModal").modal('hide');
            await destroyTable("#carTable");
            await getCars();
        }else{
            messageRender(response.data.message, 'red');
        }
        $(".errorMsg").empty();
    }).catch((error) => {
        $(".errorMsg").empty();
        messageRender(error.response.data.error, 'red');
    })
}

async function carEdit(id) {
    axios.get('/admin/car/get/'+id)
    .then(async (response) => {
        if(response.status === 200){
            let cars = response.data;
            $("#car_name").val(cars.name);
            $("#car_brand").val(cars.brand);
            $("#car_model").val(cars.model);
            $("#car_year").val(cars.year);
            $("#car_price").val(cars.daily_rent_price);
            $("#car_id").val(cars.id);
            await selectOption("#car_type option",cars.car_type);
            await selectOption("#car_availablity option",cars.availability);
            $("#previewImage").attr('src',"/storage/"+cars.image);
            $("#carEditModal").modal('show');
        }
    });
}

async function carDelete(id) {
    axios.delete('/admin/car/delete/'+id)
    .then(async (response) => {
        if(response.status === 200){
            messageRender(response.data.message,'green','success');
            await destroyTable("#carTable");
            await getCars();
        }else{
            messageRender(response.data.message,'red');
        }
    }).catch(error => {
        messageRender(error.response.data.message,'red');
    })
}


async function selectOption(container,value) {
    $(container).each((index,item) => {
        if($(item).val() == value){
            $(item).attr('selected',true);
        }else{
            $(item).attr('selected',false); 
        }
    });
}




/*************************
 * | Admin Rents Operation
 ************************/



async function rentCancel(id,customer,car,isRent=false) {
    await spinner(".errorMsg"+id);
    axios.post('/admin/rents/cancel/',{id:id,customer:customer})
    .then(async (response) => {
        if(response.status === 200){
            messageRender(response.data.message,'green','success');
            await destroyTable("#rentTable");
            if(isRent){
                await rentByCar(car);
            }else{
                await getRents();
            }
        }else{
            messageRender(response.data.message,'red');
        }
        $(".errorMsg"+id).empty();
    }).catch(error => {
        $(".errorMsg"+id).empty();
        messageRender(error.response.data.message,'red');
    })
}


async function rentByCar(id=null) {
    axios.get('/admin/rent/by-car/'+id)
    .then(async(response) => {
        if(response.status === 200){
            let rents = response.data.data.rental;
            $("#carByRent").empty();
            $(rents).each((index,item) => {
                let button = '';
                let txtClass = 'text-dark';
                if(item.status === 'Completed'){
                    txtClass = 'text-success';
                }else if(item.status === 'Canceled'){
                    txtClass = 'text-danger'
                }else if(item.status === 'Ongoing'){
                    txtClass = 'text-primary'
                }else{
                    txtClass = 'text-secondary'
                    button = `<button class='btn btn-outline-danger' onClick="rentCancel('${item.id}','${item.user_id}','${response.data.data.id}','true')" >Cancel</button><span class="errorMsg${item.id}"></span>`;
                }
                $("#carByRent").append(`
                    <tr>
                        <td>${item.user.customer_detail !== null ? item.user.customer_detail.phone : item.user.name}</td>
                        <td>${item.user.customer_detail !== null ? item.user.customer_detail.phone : ''}</td>
                        <td>${item.start_date}</td>
                        <td>${item.end_date}</td>
                        <td>${item.days}</td>
                        <td>${item.total_cost}</td>
                        <td class='${txtClass}'>${item.status}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-between">
                                ${button}
                            </div>
                        </td>
                    </tr>
                `);
            });
            await renderTable('#rentTable');
        }else{
            messageRender(response.data.message,'red');
        }
    }).catch(error => {
        messageRender(error.response.data.message,'red');
    })
}

async function getRents(id=null) {
    let url = id !== null ? '/admin/get-rents/'+id : '/admin/get-rents'
    axios.get(url)
    .then(async(response) => {
        if(response.status === 200){
            let rents = response.data;
            $("#rentalBody").empty();
            $(rents).each((index,item) => {
                let button = '';
                let txtClass = 'text-dark';
                if(item.status === 'Completed'){
                    txtClass = 'text-success';
                }else if(item.status === 'Canceled'){
                    txtClass = 'text-danger'
                }else if(item.status === 'Ongoing'){
                    txtClass = 'text-primary'
                }else{
                    txtClass = 'text-secondary'
                    button = `<button class='btn btn-outline-danger' onClick="rentCancel('${item.id}','${item.user_id}','${item.car_id}')" >Cancel</button><span class="errorMsg${item.id}"></span>`;
                }


                $("#rentalBody").append(`
                    <tr>
                        <td>${item.car.name}</td>
                        <td>${item.user.customer_detail !== null ? item.user.customer_detail.phone : item.user.name}</td>
                        <td>${item.user.customer_detail !== null ? item.user.customer_detail.phone : ''}</td>
                        <td>${item.start_date}</td>
                        <td>${item.end_date}</td>
                        <td>${item.days} days</td>
                        <td>${item.total_cost}</td>
                        <td class='${txtClass}'>${item.status}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-between">
                                ${button}
                            </div>
                        </td>
                    </tr>
                `);
            });
            await renderTable('#rentTable');
        }else{
            messageRender(response.data.message,'red');
        }
    }).catch(error => {
        alert(error)
        messageRender(error.response.data.message,'red');
    })
}

async function getCarType() {
    axios.get('/car/types')
    .then(async(response) => {
        $("#carType").empty();
        $("#carType").append(`<option value='' selected>Select Car Type</option>`);
        if(response.status === 200){
            $(response.data.data).each((index,item) => {
                $("#carType").append(`<option value="${item.car_type}">${item.car_type}</option>`);
            })
        }else{
            $("#carBy").empty();
        }
    }).catch(error => {
        $("#carBy").empty();
    })
}

async function getCarByType() {
    let type =  $("#carType").val();
    axios.get('/admin/car/get-by/type/'+type)
    .then(async(response) => {
        $("#carBy").empty();
        $("#carBy").append(`<option value='' selected>Select A Car</option>`);
        if(response.status === 200){
            $(response.data.data).each((index,item) => {
                $("#carBy").append(`<option data-amount="${item.daily_rent_price}" value="${item.id}"><b>${item.brand}</b> ${item.name}</option>`);
            })
        }
    })
}

async function getCustomerForRent() {
    axios.get('/admin/get-customer')
    .then(async(response) => {
        $("#customerID").empty();
        $("#customerID").append(`<option value='' selected>Select A Customer</option>`);
        if(response.status === 200){
            $(response.data).each((index,user) => {
                $("#customerID").append(`<option value="${user.id}"><b>${user.name}</b> ${(user.customer_detail !== null ? user.customer_detail.phone : '')} </option>`);
            })
        }
    }).catch(error => {
        alert(error);
    })
}

async function chekAvailability() {
    await spinner('.errorMsg');
    axios.post('/admin/car/availability',$("#carForm").serialize())
    .then(async (response) => {
        if(response.status === 200){
            messageRender(response.data.message,'green','success');
            $("#carForm")[0].reset();
            $("#rentalAddModal").modal('hide');
            await destroyTable("#rentTable");
            await getRents();
        }else{
            messageRender(response.data.message,'red');
        }
        $(".errorMsg").empty();
    }).catch(error => {
        messageRender(error.response.data.message,'red');
        $(".errorMsg").empty();
    });
}

async function addNewRent() {
    $("#rentalAddModal").modal('show');
    await getCustomerForRent();
    await getCarType();
}

async function getCustomer() {
    axios.get('/admin/get-customer')
    .then(async (response) => {
        if(response.status === 200){
            let customer = response.data;
            $("#customerBody").empty();
            $(customer).each((index,user) => {
                $("#customerBody").append(`
                    <tr>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${(user.customer_detail !== null ? user.customer_detail.phone : '')}</td>
                        <td>${(user.customer_detail !== null ? user.customer_detail.address : '')}</td>
                        <td>${user.created_at}</td>
                    </tr>
                `);
            });
            await renderTable('#customerTable');
        }else{
            messageRender(response.data.message,'red');
        }
    }).catch(error => {
        alert(error)
        messageRender(error.response.data.message,'red');
    })
}

async function newCustomer() {
    $("#customerAddModal").modal('show');
}

async function createCustomer() {
    await spinner(".errorMsg");
    axios.post('/admin/create/user/',$("#customerForm").serialize())
    .then(async (response) => {
        if(response.status === 201){
            messageRender(response.data.message,'green','success');
            $("#customerForm")[0].reset();
            await destroyTable("#customerTable");
            await getCustomer();
        }else{
            messageRender(response.data.message,'red');
        }
        $(".errorMsg").empty();
    }).catch(error => {
        $(".errorMsg").empty();
        messageRender(error.response.data.message,'red');
    })
}