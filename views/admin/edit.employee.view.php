<?php require "layouts/header.php";
require "layouts/navbar.php"; ?>
<form action="controllers/admin/edit.employee.process.controller.php" method="post" class="col-xl-9 col-lg-8  col-md-12">
    <div class="accordion add-employee" id="accordion-details">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="basic1">
                <h4 class="cursor-pointer mb-0">
                    <a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
                        Basic Details
                        <br><span class="ctm-text-sm">Organized and secure.</span>
                    </a>
                </h4>
            </div>
            <div class="card-body p-0">
                <div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
                    <div class="row">
                        <div class="col pb-2">
                            <img src="<?= $user['profile'] ?>" alt="" class="img-fluid rounded-circle" width="100">
                        </div>
                    </div>
                    <div class="row">
                        <input type="hidden" class="form-control" placeholder="First Name" value="<?= $user['uid'] ?>" name="uid">
                        <div class="col form-group">
                            <input type="text" class="form-control" placeholder="First Name" value="<?= $user['first_name'] ?>" name="first_name">
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" placeholder="Last Name" value="<?= $user['last_name'] ?>" name="last_name">
                        </div>
                        <div class=" col-12 form-group">
                            <input type="email" class="form-control" placeholder="Email" value="<?= $user['email'] ?>" name="email">
                        </div>
                        <div class=" col-12 form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class=" col-12 form-group">
                            <input type="text" class="form-control" placeholder="Password" name="phone_number" value="<?= $user['phone_number'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="headingTwo">
                <h4 class="cursor-pointer mb-0">
                    <a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#employee-det">
                        Employment Details
                        <br><span class="ctm-text-sm">Let everyone know the essentials so they're fully prepared.</span>
                    </a>
                </h4>
            </div>
            <div class="card-body p-0">
                <div id="employee-det" class="collapse show ctm-padding" aria-labelledby="headingTwo" data-parent="#accordion-details">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <div class="cal-icon">
                                <input type="text" name="date_of_birth" class="form-control" placeholder="Date of birth" value="<?= $user['date_of_birth'] ?>">
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-control select" name="positions">
                                <option>Select one position</option>
                                <?php for ($i = 0; $i < count($positions); $i++) { ?>
                                    <option value="<?= $positions[$i]['position_id'] ?>"><?= $positions[$i]['position_name'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <select name="role" id="role" class="form-control select">
                                <?php for ($i = 0; $i < count($roles); $i++) {
                                    if ($roles[$i]['role_id'] == $user['role_id']) { ?>
                                        <option value="<?= $roles[$i]['role_id'] ?>" selected><?= $roles[$i]['role_name'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $roles[$i]['role_id'] ?>"><?= $roles[$i]['role_name'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-12 form-group mb-0">
                            <p class="mb-2">Employment Type</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="Permanent" name="Permanent" checked>
                                <label class="custom-control-label" for="Permanent">Permanent</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="Freelancer" name="Permanent">
                                <label class="custom-control-label" for="Freelancer">Freelancer</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="headingThree">
                <h4 class="cursor-pointer mb-0">
                    <a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#term-office">
                        Teams and Offices
                        <br><span class="ctm-text-sm">Keep things tidy — and save time setting approvers and public holidays.</span>
                    </a>
                </h4>
            </div>
            <div class="card-body p-0">
                <div id="term-office" class="collapse show ctm-padding" aria-labelledby="headingThree" data-parent="#accordion-details">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <select class="form-control select">
                                <option selected>Teams </option>
                                <option value="1">PHP</option>
                                <option value="2">Android</option>
                                <option value="3">Testing</option>
                                <option value="3">Designing</option>
                                <option value="3">IOS</option>
                                <option value="3">Business</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-control select">
                                <option selected>Line Manager</option>
                                <option value="1">Robert Wilson</option>
                                <option value="2">Maria Cotton</option>
                                <option value="3">Danny Ward</option>
                                <option value="4">Linda Craver</option>
                                <option value="5">Jenni Sims</option>
                                <option value="6">John Gibbs</option>
                                <option value="7">Stacey Linville</option>
                            </select>
                        </div>
                        <div class="col-12 form-group mb-0">
                            <select class="form-control select" name="departments">
                                <option>Select one department</option>
                                <?php for ($i = 0; $i < count($departments); $i++) { ?>
                                    <option value="<?= $departments[$i]['department_id'] ?>"><?= $departments[$i]['department_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="headingFour">
                <h4 class="cursor-pointer mb-0">
                    <a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#salary_det">
                        Salary Details
                        <br><span class="ctm-text-sm">Stored securely, only visible to Super Admins, Payroll Admins, and themselves.</span>
                    </a>
                </h4>
            </div>
            <div class="card-body p-0">
                <div id="salary_det" class="collapse show ctm-padding" aria-labelledby="headingFour" data-parent="#accordion-details">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <select class="form-control select">
                                <option selected>Currency </option>
                                <option value="1">$</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="number" class="form-control" placeholder="Amount" value="<?= $user['salary'] ?>" name="salary">
                        </div>
                        <div class="col-12 form-group">
                            <select class="form-control select">
                                <option selected>Frequency</option>
                                <option value="1">Annualy</option>
                                <option value="2">Monthly</option>
                                <option value="3">Weekly</option>
                                <option value="4">Daily</option>
                                <option value="5">Hourly</option>
                                <option value="6">Fixed</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="col-12">
                <div class="submit-section text-center btn-add">
                    <button class="btn btn-theme text-white ctm-border-radius button-1">Add Team Member</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require "layouts/footer.php"; ?>