<form class="form-horizontal" method="post">
	<div class="clonefields">
        <div id="clonedInput1" class="clonedInput">
            <h3>Add Research Information</h3>
            <div class="col-md-6">
            <div class="form-fields">
                <div class="form-group">
                    <label  class="control-label">First Name</label>
                    <input type="text" class="form-control" id="firstname1" name="researcher[0][firstname]" placeholder="" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Designation</label>
                    <input type="text" class="form-control" id="designation1" name="researcher[0][designation]" placeholder="" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Email Address</label>
                    <input type="email" class="form-control" id="emailaddress1" name="researcher[0][email_address]" placeholder="" required>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-fields">
                <div class="form-group">
                    <label  class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname1" name="researcher[0][lastname]" placeholder="" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Telephone</label>
                    <input type="text" class="form-control" id="telephone1" name="researcher[0][telephone]" placeholder="" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Website</label>
                    <input type="url" class="form-control" id="website1" name="researcher[0][website]" placeholder="" required>
                </div>
            </div>
        </div>
        
        <div class="clearfix visible-xs-block"></div>
        
        <div class="col-md-12">
            <div class="form-fields">
                <div class="form-group">
                    <label class="control-label">Area of Expertise and Interest</label>
                    <textarea class="form-control" id="expertise1" name="researcher[0][expertise]" rows="4"></textarea>
                    <span class="help-block">(List max. 5 in order of preference.)</span>
                </div>
            </div>
            <div class="form-fields">
                <div class="form-group">
                    <label class="control-label">List up to 5 relevant publications or research outputs</label>
                    <textarea class="form-control" id="publications1" name="researcher[0][publications]" rows="4"></textarea>
                    <span class="help-block">(e.g. -‐ videos, policy brief, software, tools, dataset etc.)</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-fields">
                <div class="form-group">
                    <label  class="control-label">Research Institution/ Organization Name</label>
                    <input type="text" class="form-control" id="organization1" name="researcher[0][organization]" placeholder="" required>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-fields">
                <div class="form-group">
                    <label class="control-label">Country of Incorporation</label>
                    <input type="text" class="form-control" id="country1" name="researcher[0][country]" placeholder="" required>
                </div>
            </div>
        </div>
        
        <div class="clearfix visible-xs-block"></div>
        
        <div class="col-md-12">
        	<div class="form-fields">
                <div class="form-group">
                    <label class="control-label">Office Address</label>
                    <textarea class="form-control" name="publications[]" rows="4"></textarea>
                </div>
            </div>
        </div>
        </div>
        
    </div>
    
    <div class="text-center"> 
    <button type="button" class="btn btn-success btn-lg" id="append_user">Add Researcher </button>
    <button type="submit" class="btn btn-primary btn-lg">Save &amp; Continue </button>
    </div>
    
    </form>