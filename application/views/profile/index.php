<!-- Begin Page Content -->

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <div class="card rounded-0 shadow">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="card-header d-flex">
        <h3 class="card-title font-weight-bolder text-dark h3 mb-0">
          <?= $account['name'] ?>
        </h3>
        <!-- --------------------------------------------------------------------------- -->
        <!-- Success Message Alert -->


        <button type="button" class="btn btn-primary ml-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Apply Leave
        </button>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Apply Leave</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="<?= base_url('leavecontroller/applyleave') ?>" method="post">
                  <div class="mb-3">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                  </div>
                  <div class="mb-3">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                  </div>
                  <div class="mb-3">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                  </div>
                  <input type="hidden" name="employeeId" value="<?= $account['id']; ?>">
                  <input type="hidden" name="employeeName" value="<?= $account['name']; ?>">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                  <button type="submit" class="btn btn-primary">Apply</button>
                </form>
              </div>
              <div class="modal-footer"> </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ------------------------------------------------------------------------------------- -->
      <div class="card-body">
        <div class="container-fluid">
          <div class="row">

            <!-- left -->
            <div
              class="col-sm-10 col-md-5 col-lg-4 col-xl-3 offset-sm-1 offset-md-0 offset-lg-0 offset-xl-0 text-center">
              <img src="<?= base_url('images/pp/') . $account['image']; ?>" class="rounded-circle img-thumbnail">
            </div>

            <!-- right -->
            <div class="col-sm-10 col-md-6 offset-sm-1">
              <h1 class="h3 text-white bg-gradient-dark p-1 rounded-0 mt-1 mb-3">Information</h1>
              <table class="table">
                <tbody>
                  <tr>
                    <th scope="row">Employee ID</th>
                    <td>:
                      <?= $account['id']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Gender</th>
                    <td>:
                      <?php if ($account['gender'] == 'M') {
                        echo 'Male';
                      } else {
                        echo 'Female';
                      }
                      ; ?>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Department</th>
                    <td>:
                      <?= $account['department'] ?>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Birthday</th>
                    <td>:
                      <?= $account['birth_date']; ?>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Joined On</th>
                    <td>:
                      <?= $account['hire_date'] ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
</body>