        var save_method; //for save method string
        var table;
        var text;
        var tableID = $("table").attr('id');

        $(document).ready(function() {
            if(tableID == "customer-table"){
            //datatables
                    table = $('#customer-table').DataTable({ 
                 
                        "processing": true, //Feature control the processing indicator.
                        "serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.
                 
                        // Load data for the table's content from an Ajax source
                        "ajax": {
                            "url": "customer/customer_controller/ajax_list",
                            "type": "POST",
                        },
                 
                        //Set column definition initialisation properties.
                        "columnDefs": [
                        { 
                            "targets": [ -1 ], //last column
                            "orderable": false, //set not orderable
                        },
                        ],
                 
                    });
            } else{
                    table = $('#supplier-table').DataTable({ 
                 
                        "processing": true, //Feature control the processing indicator.
                        "serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.
                 
                        // Load data for the table's content from an Ajax source
                        "ajax": {
                            "url": "supplier/supplier_controller/ajax_list",
                            "type": "POST",
                        },
                 
                        //Set column definition initialisation properties.
                        "columnDefs": [
                        { 
                            "targets": [ -1 ], //last column
                            "orderable": false, //set not orderable
                        },
                        ],
                 
                    });

            }
             
            });

         
        function add_data() // ---> calling for the Add Modal form
        {
            
            if(tableID == "table"){
                save_method = 'add-customer';
                text = 'Add Person';
            }else{
                save_method = 'add-supplier';
                text = 'Add Supplier';
            }
            // alert(save_method);
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text(text); // Set Title to Bootstrap modal title
        }
         
        function edit_person(id) // for customer table
        {
            save_method = 'update-customer';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
         
            //Ajax Load data from ajax
            $.ajax({
                url : "customer/customer_controller/ajax_edit/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id"]').val(data.customer_id);
                    $('[name="lastname"]').val(data.lastname);
                    $('[name="firstname"]').val(data.firstname);
                    $('[name="middlename"]').val(data.middlename);
                    $('[name="address"]').val(data.address);
                    $('[name="city"]').val(data.city);
                    $('[name="contact"]').val(data.contact);
                    $('[name="email"]').val(data.email);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title
         
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }
        

        function edit_supplier(id) // for supplier table
        {
            save_method = 'update-supplier';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
         
            //Ajax Load data from ajax
            $.ajax({
                url : "supplier/supplier_controller/ajax_edit/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id"]').val(data.supplier_id);
                    $('[name="name"]').val(data.name);
                    $('[name="address"]').val(data.address);
                    $('[name="city"]').val(data.city);
                    $('[name="contact"]').val(data.contact);
                    $('[name="email"]').val(data.email);
                    $('[name="status"]').val(data.status);
                    $('[name="products"]').val(data.products);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit supplier'); // Set title to Bootstrap modal title
         
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
         
            if(save_method == 'add-customer') {
                url = "customer/customer_controller/ajax_add";
            }else if(save_method == 'update-customer'){
                url = "customer/customer_controller/ajax_update";
            }else if(save_method == 'add-supplier'){
                url = "supplier/supplier_controller/ajax_add";
            }else if(save_method == 'update-supplier'){
                url = "supplier/supplier_controller/ajax_update";
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
         
        function delete_person(id)
        {
            if(confirm('Are you sure delete this data?'))
            {
                // ajax delete data to database
                $.ajax({
                    url : "customer/customer_controller/ajax_delete/"+id,
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

        function delete_supplier(id)
        {
            if(confirm('Are you sure delete this data?'))
            {
                // ajax delete data to database
                $.ajax({
                    url : "supplier/supplier_controller/ajax_delete/"+id,
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

