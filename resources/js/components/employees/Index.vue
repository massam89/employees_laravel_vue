<template>
  <div>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>
    <div class="row">
        <div class="card mx-auto">
           
                <div class="alert alert-success">
               
                </div>
          

         
                <div class="alert alert-danger">
                
                </div>
      

            <form method="GET" action="" class="mx-auto mt-3 row gy-2 gx-3 align-items-center">
              <div class="col-auto">
                <input type="search" name="search" class="form-control" id="autoSizingInput" placeholder="Search for something...">
              </div>
          
              <div class="col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
              <router-link :to="{name: 'EmployeesCreate'}" class="btn bg-info text-white">Create</router-link>
            </form>

            <div class="card-body">
                <table class="table table-responsive text-center">
                    <thead>
                      <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Department</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                              <a href="" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div> 
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>