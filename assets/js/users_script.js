var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#users-table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "users/users_controller/users_list",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
  /*  $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
*/
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("email").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});

                                                         
function add_user()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
}

function _password()
{
    save_method = 'update_password';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_password').modal('show'); // show bootstrap modal
    $('.modal-title').text('Update Password'); // Set Title to Bootstrap modal title
}

function _privilege(id)
{
    save_method = 'update_privilege';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
   //Ajax Load data from ajax
    
    $.ajax({
        url : "users/users_controller/users_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.user_id);
            $('[name="administrator"]').val(data.administrator).prop('selected', true);
            $('[name="cashier"]').val(data.cashier).prop('selected', true);
            $('[name="inventory"]').val(data.inventory).prop('selected', true);
            $('[name="supplier"]').val(data.supplier).prop('selected', true);
            $('[name="customer"]').val(data.customer).prop('selected', true);
            $('[name="user"]').val(data.user).prop('selected', true);
            $('[name="report"]').val(data.report).prop('selected', true);

            
            $('#modal_form_privilege').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Privilege'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });


}

function edit_user(id)
{
    save_method = 'update_user';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "users/users_controller/users_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.user_id);
            $('[name="username"]').val(data.username);
            $('[name="firstname"]').val(data.firstname);
            $('[name="lastname"]').val(data.lastname);
            $('[name="middlename"]').val(data.middlename);
            $('[name="contact"]').val(data.contact);
            $('[name="email"]').val(data.email);
            $('[name="address"]').val(data.address);
            $('[name="administrator"]').val(data.administrator);
            $('[name="cashier"]').val(data.cashier);
            $('[name="inventory"]').val(data.inventory);
            $('[name="supplier"]').val(data.supplier);
            $('[name="customer"]').val(data.customer);
            $('[name="user"]').val(data.user);
            $('[name="report"]').val(data.report);



            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}



function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    // save user here...........
    if(save_method == 'add') {
        url = "users/users_controller/users_add";
    }else if (save_method == 'update_password' ){
        url = "../users/users_controller/password_update";
    }else{
        url = "../users/users_controller/users_update";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });


}



function _save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if (save_method == 'update_privilege'){
        url = "users/users_controller/privilege_update";
    }else{
        url = "../users/users_controller/password_update";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_privilege').modal('hide');
                $('#modal_form_password').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });


}


function delete_user(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "users/users_controller/users_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}