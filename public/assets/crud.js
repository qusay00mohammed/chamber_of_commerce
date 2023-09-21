toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toastr-top-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
// Store
function store(url, data) {
    axios.post(url, data)
        .then(function (response) {
            clearForm();
            $('#kt_datatable_example_5').DataTable().ajax.reload();
            toastr.success("تمت الاضافة بنجاح");
            document.getElementById('loading').style.display = 'none';
        })
        .catch(function (error) {
            toastr.error(error.response.data.errors);
            document.getElementById('loading').style.display = 'none';
            console.log(error.response.data.errors); // ---------
        });
}

// Delete
function confirmDestroy(url, td) {
    Swal.fire({
        title: 'هل أنت متأكد من عملية الحذف ؟',
        text: "لا يمكن التراجع عن عملية الحذف",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا',
    }).then((result) => {
        if (result.isConfirmed) {
            destroy(url, td);
        }
    });
}

function destroy(url, td) {
    axios.delete(url)
        .then(function (response) {
            td.closest('tr').remove();
            toastr.warning("تم الحذف بنجاح");
        })
        .catch(function (error) {
            toastr.error(error.response.data.errors);
        })
        .then(function () {
            // always executed
        });
}

// Delete
function confirmForceDelete(url, td) {
    Swal.fire({
        title: 'هل أنت متأكد من عملية الحذف ؟',
        text: "لا يمكن التراجع عن عملية الحذف",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا',
    }).then((result) => {
        if (result.isConfirmed) {
            forceDel(url, td);
        }
    });
}

function forceDel(url, td) {
    axios.delete(url)
        .then(function (response) {
            td.closest('tr').remove();
            toastr.warning("تم الحذف بنجاح");
        })
        .catch(function (error) {
            toastr.error(error.response.data.errors);
        })
        .then(function () {
            // always executed
        });
}

function restoreNews(url, td) {
    axios.delete(url)
        .then(function (response) {
            td.closest('tr').remove();
            toastr.warning("تمت إعادة الخبر بنجاح");
        })
        .catch(function (error) {
            toastr.error(error.response.data.errors);
        })
        .then(function () {
            // always executed
        });
}

// Delete
function performDelete(url, h2) {
    Swal.fire({
        title: 'هل أنت متأكد من عملية الحذف ؟',
        text: "لا يمكن التراجع عن عملية الحذف",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا',
    }).then((result) => {
        if (result.isConfirmed) {
            destroyDel(url, h2);
        }
    });
}

function destroyDel(url, h2) {
    axios.delete(url)
        .then(function (response) {
            h2.closest('h2').remove();
            toastr.warning("تم الحذف بنجاح");
        })
        .catch(function (error) {
            toastr.error(error.response.data.errors);
        })
        .then(function () {
            // always executed
        });
}

// delete image
function destroyImage(url, ele, type) {
    axios.post(url, {
        typeModel: type,
    })
        .then(function (response) {
            ele.closest('div').remove();

            toastr.warning("تم الحذف بنجاح");
        })
        .catch(function (error) {
            toastr.error(error.response.data.errors);
        })
        .then(function () {
            // always executed
        });
}

// Update
function update(url, data, redirectUrl) {

    axios.post(url, data)
        .then(function (response) {
            if (redirectUrl != null)
                window.location.href = redirectUrl;
        })
        .catch(function (error) {
            toastr.error(error.response.data.errors);
            document.getElementById('loading').style.display = 'none';
        });
}




function qusay(url, data, redirectUrl) {
    axios.post(url, data)
        .then(function (response) {
            // showMessage(response.data);
            // console.log(response.data);
            window.location.href = redirectUrl;
            // clearForm();
            // $('#kt_datatable_example_5').DataTable().ajax.reload();
            // toastr.options = {
            //     "closeButton": false,
            //     "debug": false,
            //     "newestOnTop": false,
            //     "progressBar": false,
            //     "positionClass": "toastr-top-left",
            //     "preventDuplicates": false,
            //     "onclick": null,
            //     "showDuration": "300",
            //     "hideDuration": "1000",
            //     "timeOut": "5000",
            //     "extendedTimeOut": "1000",
            //     "showEasing": "swing",
            //     "hideEasing": "linear",
            //     "showMethod": "fadeIn",
            //     "hideMethod": "fadeOut"
            // };

            // toastr.success("تمت الاضافة بنجاح");
            // clearAndHideErrors();

        })
        .catch(function (error) {
            console.log(error.response.data.errors);
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toastr-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error(error.response.data.errors);
            // if (error.response.data.errors !== undefined) {
            //     showErrorMessages(error.response.data.errors);
            // } else {

            //     showMessage(error.response.data);
            // }
        });
}




function storepart(url, data) {

    axios.post(url, data)

        .then(function (response) {
            showMessage(response.data);
            clearForm();
            clearAndHideErrors();

        })

        .catch(function (error) {

            if (error.response.data.errors !== undefined) {
                showErrorMessages(error.response.data.errors);
            } else {

                showMessage(error.response.data);
            }
        });

}
function storeRoute(url, data) {
    axios.post(url, data, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
})
        .then(function (response) {
                window.location = response.data.redirect;
             // showMessage(response.data);
            // clearForm();
            // clearAndHideErrors();

        })
        .catch(function (error) {

            if (error.response.data.errors !== undefined) {
                showErrorMessages(error.response.data.errors);
            } else {

                showMessage(error.response.data);
            }
        });
}
function storeRedirect (url, data, redirectUrl) {
    axios.post( url, data)
        .then(function (response) {
            console.log(response);
            if (redirectUrl != null)
                window.location.href = redirectUrl;
        })
        .catch(function (error) {
            console.log(error.response);
        });
}




function updateRoute (url, data) {
    axios.put( url, data)

        .then(function (response) {
            console.log(response);

        window.location = response.data.redirect;

        })
        .catch(function (error) {
            console.log(error.response);
        });
}
function updateReload (url, data, redirectUrl) {
    axios.put( url, data)
        .then(function (response) {
            console.log(response);
            location.reload()
        })
        .catch(function (error) {
            console.log(error.response);
        });
}
function updatePage(url, data) {
    axios.post(url, data)
        .then(function (response) {
            console.log(response);
            location.reload()
            // showMessage(response.data);
         })
        .catch(function (error) {
            console.log(error.response);
        });
}









function showErrorMessages(errors) {

    document.getElementById('error_alert').hidden = false
    var errorMessagesUl = document.getElementById("error_messages_ul");
    errorMessagesUl.innerHTML = '';

    for (var key of Object.keys(errors)) {
        var newLI = document.createElement('li');
        newLI.appendChild(document.createTextNode(errors[key]));
        errorMessagesUl.appendChild(newLI);
    }
}

function clearAndHideErrors() {
    document.getElementById('error_alert').hidden = true
    var errorMessagesUl = document.getElementById("error_messages_ul");
    errorMessagesUl.innerHTML = '';
}

function clearForm() {
    document.getElementById("create_form").reset();
}

function showMessage(data) {
    console.log(data);
    Swal.fire({
        position: 'center',
        icon: data.icon,
        title: data.title,
        showConfirmButton: false,
        timer: 1500
    })
}


