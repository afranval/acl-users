<div class="col-lg-12">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-4 justify-content-center">
      <?= $this->Form->create() ?>

        <div class="divider d-flex align-items-center my-4">
          <h2 class="text-center fw-bold mx-0 mb-0">Sing in</h2>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="email" name="email" class="form-control form-control-lg"
            placeholder="Enter a valid email address" />
          <label class="form-label" for="email">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-3">
          <input type="password" id="password" name="password" class="form-control form-control-lg"
            placeholder="Enter password" />
          <label class="form-label" for="password">Password</label>
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
          <button type="sumit" class="btn btn-primary btn-lg w-100"
            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
        </div>

        <?= $this->Form->end() ?>
    </div>    
  </div>

</div>