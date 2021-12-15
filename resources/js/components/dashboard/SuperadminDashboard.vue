<template>
  <div class="row">
    <div class="col-12 col-xl-8">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-title mb-0 d-flex align-items-center">
                <div class="card-title-icon mr-2">
                  <i class='bx bx-user'></i>
                </div>
                <h6>Superadmin dashboard</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-xl-8">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-title mb-0 d-flex align-items-center">
                <div class="card-title-icon mr-2">
                  <i class='bx bx-cog'></i>
                </div>
                <h6>Settings</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  export default {
    name: "SuperadminDashboard",
  }
</script>

<style scoped>
  .card-title-icon {
    font-size: 24px;
  }
</style>
