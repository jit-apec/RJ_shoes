<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css');
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.1/angular.min.js"></script> --}}
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



  <!-- /.navbar -->
  @include('admin.header');

  @include('admin.sidebar');

  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">

            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/admin/product/display')}}">Product</a></li>
                <li class="breadcrumb-item">Add</li>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary ">
            <div class="card-header">
            <h3 class="card-title">Add Product</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="text-center mt-0 mb-0 p-1">
                    <a class="btn btn-success bg-gradient-success  btn-sm float-right " href="{{url('/admin/brand/display')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

                  </div>
                <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                <div class="row" ng-app="">
                    <div class="col-md-12">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" ng-model="name" class="form-control" id='amount' onKeyUp="javascript: replacetext('amount'); " >
                    <a href=" " > http//localhost/<span ng-bind="name"></span> </a>
                        <i class="fas fa-edit"></i>
                    </div>
                </div>
                {{-- <div ng-app="myAppTrim">
                  <div ng-controller="myControllerTrim">
                    <button type="button" ng-click="trimDemo()">Click Hear For Trim</button>
                    <p  data-ng-bind-html="" > {{resultTrim}}</p>
                    <p ng-bind="resultTrim"></p>
                  </div>
                </div> --}}

            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputcategory">Category<span class="text-danger">*</span></label>
                  <select id="inputcategory" class="form-control">
                    <option selected>Select Category</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputcolor">color<span class="text-danger">*</span></label>
                  <select id="inputcolor" class="form-control">
                    <option selected>Select Color</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPrice">Price<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup">
                    </div>
                </div>
            </div>

            <!-- /.row -->
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputideal">Ideal For<span class="text-danger">*</span></label>
                    <select id="inputideal"  class="form-control">
                      <option selected>Select Gender</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Child</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputupc">UPC<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-tag"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputstock">Stock<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <!-- text input -->
                    {{-- <div class="form-group">
                      <label>Discription<span class="text-danger">*</span></label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="This Box has a Limit of 1000 Chars"></textarea>
                    </div> --}}
                    <label>Discription<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">

                        <div class="input-group-prepend">
                          <div class="input-group-text">1000</i></div>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="This Box has a Limit of 1000 Chars"></textarea>
                      </div>
                </div>
                <div class="col-sm-6">

                    <div class="form-group">
                      <label>Main Image<span class="text-danger">*</span></label>
                     <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
            <div class="form-row">
              <div ng-app="dynamicApp" ng-controller="dynamicController" class="container" style="width:600px;" ng-init="fetchData()">
                <form method="post" ng-submit="submitForm()">

                 <fieldset ng-repeat="row in rows">
                  <div class="form-group">
                   <label>Enter Your Programming Skill</label>
                   <div class="row">
                    <div class="col-md-9">
                     <input type="text" name="programming_languages[]" class="form-control" ng-model="formData.skill[$index + 1]" />
                    </div>
                    <div class="col-md-3">
                     <button type="button" name="remove" ng-model="row.remove" class="btn btn-danger btn-sm" ng-click="removeRow()"><span class="glyphicon glyphicon-minus"></span></button>
                    </div>
                   </div>
                  </div>
                 </fieldset>
                 <div class="form-group">
                  <button type="button" name="add_more" class="btn btn-success" ng-click="addRow()"><span class="glyphicon glyphicon-plus"></span> Add</button>
                  <input type="submit" name="submit" class="btn btn-info" value="Save" />
                 </div>
                </form>
          </div>
        </div>
        </div>
      </div>
    </section>
</div>
@include('admin.footer');
</body>
@include('admin.jquery');
<script type="text/javascript">

  function replacetext(i) {
  var val = document.getElementById(i).value;
  if (val.match(/ /g)) {
  val = val.replace(/\s+/g, '-');
  document.getElementById(i).value=val;
  }
  }

  </script>
</html>

<script>

  var app = angular.module('dynamicApp', []);

  app.controller('dynamicController', function($scope, $http){

   $scope.success = false;
   $scope.error = false;

   $scope.fetchData = function(){
    $http.get('fetch_data.php').success(function(data){
     $scope.namesData = data;
    });
   };

   $scope.rows = [{name: 'programming_languages[]', name: 'remove'}];

   $scope.addRow = function(){
    var id = $scope.rows.length + 1;
    $scope.rows.push({'id':'dynamic'+id});
   };

   $scope.removeRow = function(row){
    var index = $scope.rows.indexOf(row);
    $scope.rows.splice(index, 1);
   };

   $scope.formData = {};

   $scope.submitForm = function(){
    $http({
     method:"POST",
     url:"insert.php",
     data:$scope.formData
    }).success(function(data){
     if(data.error != '')
     {
      $scope.success = false;
      $scope.error = true;
      $scope.errorMessage = data.error;
     }
     else
     {
      $scope.success = true;
      $scope.error = false;
      $scope.successMessage = data.message;
      $scope.formData = {};
      $scope.rows = [{name: 'programming_languages[]', name: 'remove'}];
      $scope.fetchData();
     }
    });
   };

  });

  </script>
