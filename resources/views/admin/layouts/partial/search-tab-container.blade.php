<div class="bhoechie-tab">
            
                <!-- flight section -->
                <div class="bhoechie-tab-content">
                    <form class="form-inline" action="" method="get">
                      <div class="form-group">
                         <input type="text" class="form-control" name="university" placeholder="Search by University">
                      <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                      </div>
                     
                    </form>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <form class="form-inline" action="" method="get">
                      <div class="form-group">
                         <label>
                          <input type="radio" value="male" name="gender" class="flat-red">
                          Male
                        </label> 
                        <label>
                          <input type="radio" value="female" name="gender" class="flat-red">
                          Female
                        </label>
                      <button type="submit"  class="btn btn-xs btn-info" ><i class="fa fa-search"></i></button>
                      </div>
                     
                    </form>
                </div>
    
                <!-- hotel search -->
                <div class="bhoechie-tab-content">
                  <form class="form-inline" action="" method="get">
                      <div class="form-group">
                         <input type="text" class="form-control" name="salary" placeholder="Search by Salary">
                      <button type="submit" class="btn btn-info" ><i class="fa fa-search"></i></button>
                      </div>
                     
                    </form>
                </div>
                <div class="bhoechie-tab-content">
                  <form class="form-inline" action="" method="get">
                      <div class="form-group">
                         <input type="text" class="form-control" name="company" placeholder="Search by Company">
                      <button type="submit" class="btn btn-info" ><i class="fa fa-search"></i></button>
                      </div>
                     
                    </form>
                </div>
                <div class="bhoechie-tab-content">
                  <form class="form-inline" action="" method="get">
                      <div class="form-group">
                         <input type="text" class="form-control" name="designation" placeholder="Search by Designation">
                      <button id="designation" type="submit" class="btn btn-info" ><i class="fa fa-search"></i></button>
                      </div>
                     
                    </form>
                </div>
          </div>
          @push('js')
              <script type="text/javascript">
              // $('#designation').on('click',function(){
              //   $(this).html("");
              //   $(this).html('<i class="fa fa-search fa-spin"></i>');
              // })
              </script>
          @endpush