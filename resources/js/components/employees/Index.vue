<template>
  <div>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>
    <div class="row">
        <div class="card mx-auto">
           
             <div v-if="showMessage" class="alert alert-success">{{ message }}</div>    

            <form method="GET" action="" class="mx-auto mt-3 row gy-2 gx-3 align-items-center">
              <div class="col-auto">
                <input v-model="search" type="search" class="form-control" placeholder="Search for something...">
                <!-- v-model.lazy => is another method -->
              </div>
        
              <div class="col-auto">
                <select v-model="selectedDepartment" name="city" class="form-control" aria-label="Default select example">
                  <option value="">All</option>
                  <option v-for="department in departments" :key="department.id" :value="department.id" >{{ department.name }}</option>
                </select> 
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
                        <tr v-for="employee in employees" :key="employee.id">
                            <th scope="row">#{{ employee.id }}</th>
                            <td>{{ employee.first_name }}</td>
                            <td>{{ employee.last_name }}</td>
                            <td><abbr :title="employee.address"><i class="fas fa-map-marker-alt"></i></abbr></td>
                            <td>{{ employee.department.name }}</td>
                            <td>
                              <router-link class="btn btn-success btn-sm" :to="{
                                name: 'EmployeesEdit',
                                params: { id: employee.id}
                              }">
                              Edit
                              </router-link>
                              <button class="btn btn-danger btn-sm" @click="deleteEmployee(employee.id)">Delete</button>
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
  data() {
    return {
      employees: [],
      showMessage: false,
      message: '',
      search: null,
      selectedDepartment: null,
      departments: []
    }
  },
  created() {
    this.getEmployees();
    this.getDepartments();
  },
  watch: {
    search() {
      this.getEmployees();
    },
    selectedDepartment() {
      this.getEmployees();
    }
  },
  methods: {
    getEmployees() {
      axios.get('/api/employees', {params: {
        search: this.search,
        department_id: this.selectedDepartment
      }})
      .then(res => {
        this.employees = res.data.data;
      })
      .catch(err => console.log(err))
    },
    deleteEmployee(id) {
      axios.delete(`api/employees/${id}`)
      .then(res => {
        this.showMessage = true;
        this.message = res.data;
        this.getEmployees();
      })
      .catch(err => console.log(err))
    },
    getDepartments() {
      axios.get('/api/employees/departments')
        .then(res => {
            console.log(res.data)
            this.departments = res.data;
        })
        .catch(err => console.log(err))
    }
  }
}
</script>

<style>

</style>