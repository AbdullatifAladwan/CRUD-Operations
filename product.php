<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<input type="Hidden" id="pro" value='<?php echo $_GET['ID']?>'  required>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">

                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Product <b> </b></h2>
                        </div>
                        <div class="col-sm-3">
                            <a href="#addEmployeeModal" class="btn btn-success add" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i><span></span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                       
                    </thead>
                    <tbody id="employee_data">
                    </tbody>
                </table>
                <p class="loading">Loading Data</p>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <input type="text"   id="email_input" class="form-control" required>
                    </div>
                   
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" id="phone_input" class="form-control" required>
                      

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" onclick="addEmployee()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <input type="text" id="email_input" class="form-control" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" id="phone_input" class="form-control" required>
                        <input type="hidden" id="employee_id" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" onclick="editEmployee()" value="Save">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <input type="text"  id="email_input" class="form-control" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label>price</label>
                        <input type="number" step="0.01" id="phone_input" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Product ?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteEmployee()" value="Delete">
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
    <script>
        $(document).ready(function () {
            employeeList();
        });
        function employeeList() { 
            var pro = $('#pro').val();
           
            $.ajax({ 
                 type: 'post',
                data: {
                    pro: pro,
                },
                url: "product-list.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    var tr = '';  
                    tr += '<tr>';
                    tr += '<th>Name</th>';
                    tr += '<th>Description</th>';
                    tr += '<th>Price</th>';
                    tr += '<th>Actions</th>';
                    tr += '</tr>';
                   
                    for (var i = 0; i < response.length; i++) {
                        var ID = response[i].id;
                        var Name = response[i].name;
                        var des = response[i].des;
                        var price = response[i].price;
                        tr += '<tr>';
                        
                        tr += '<td>' + Name + '</td>';
                        tr += '<td>'  +  des + '</td>';
                       tr += '<td>' + price + '</td>';
                        tr += '<td><div class="d-flex">';
                        tr +=
                            '<a href="#viewEmployeeModal" class="m-1 view" data-toggle="modal" onclick=viewEmployee("' +
                            ID + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                        tr +=
                            '<a href="#editEmployeeModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' +
                            ID +
                            '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                        tr +=
                            '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                            ID +
                            '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                        tr += '</div></td>';
                        tr += '</tr>';
                    }
                    $('.loading').hide();
                    $('#employee_data').html(tr);

                }
            });
        }

        function addEmployee() {
            var Name = $('.add_epmployee #name_input').val();
            var des = $('.add_epmployee #email_input').val();
            var price = $('.add_epmployee #phone_input').val();

            $.ajax({
                type: 'post',
                data: {
                    Name: Name,
                    des: des,
                    price: price,
                   
                },
                
                url: "product-add.php",
                success: function (data) {
                    console.log(data)
                    var response = JSON.parse(data);
                    $('#addEmployeeModal').modal('hide');
                    employeeList();
                    alert(response.message);
                }

            })
        }

        function editEmployee() {
            var Name = $('.edit_employee #name_input').val();
            var des = $('.edit_employee #email_input').val();
            var price = $('.edit_employee #phone_input').val();
            var ID = $('.edit_employee #employee_id').val();

            $.ajax({
                type: 'post',
                data: {
                    Name: Name,
                    des: des ,
                    price: price,
                    ID: ID,
                },
                url: "product-edit.php",
                success: function (data) {
                   console.log(data)
                   var response = JSON.parse(data);
                   $('#editEmployeeModal').modal('hide');
                   employeeList();
                   alert(response.message);
                }

            })
        }

        function viewEmployee(id = 2) {
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "product-view.php",
                success: function (data) {
                    var response = JSON.parse(data);
                   // console.log(response)
                    $('.edit_employee #name_input').val(response.name);
                    $('.edit_employee #email_input').val(response.des);
                    $('.edit_employee #phone_input').val(response.price);
                   
                    $('.edit_employee #employee_id').val(response.id);
                    $('.view_employee #name_input').val(response.name);
                    $('.view_employee #email_input').val(response.des);
                    $('.view_employee #phone_input').val(response.price);
                 
                }
            })
        }

        function deleteEmployee() {
            var id = $('#delete_id').val();
            $('#deleteEmployeeModal').modal('hide');
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "product-delete.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    employeeList();
                    alert(response.message);
                }
            })
        }
    </script>

</body>

</html>