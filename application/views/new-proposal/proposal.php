<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Home | ocsdnet</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>public/new//css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>public/new/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/new/bootstrapvalidator/dist/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/new/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/new/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/new/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/new/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/new/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/new/css/sticky-footer.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/new/css/form.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url();?>public/new/js/ie-emulation-modes-warning.js"></script>
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header class="navbar navbar-inverse navbar-static-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="<?php echo base_url();?>public/new/img/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div>
        </div>
    </header>
    <!-- Begin page content -->
    <section id="proposal-form">
        <div class="container">
            <div id="proposal_id" style="display: none"><?php if ($present) {echo $id;}?></div>
            <div class="row">
                <div class="col-md-12">
                    <div id="wizard" class="wizard clearfix">
                        <h3>General Project info</h3>
                        <section>
                            <form role="form" class="project-info" action="<?php echo base_url();?>index.php/proposal/projectinfo">
                              <input type="hidden" name="proposal_id" value="<?php if ($present) {echo $id;}?>" />
                              <div class="form-group">
                                <label for="projectTitle">Project Title</label>
                                <input type="text" class="form-control" name="title" value="<?php if ($present) {echo $title;}?>" id="title" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="projectTitle">Duration of the project</label><br/>
                                <label for="projectTitle">The duration of your project should be stated in the number of months that require funding.</label>
                                <input type="text" class="form-control" name="duration" value="<?php if ($present) {echo $duration;}?>" id="duration" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="projectTitle">Countries included in this project</label><br/>
                                <label for="projectTitle">This includes the countries in which the research will take place as well as the countries in which project collaborators currently reside.</label>
                                <input type="text" class="form-control" value="<?php if ($present) {echo $countries_covered;}?>" name="countries" id="countries" placeholder="">
                              </div>
                              <div class="form-group">
                                  <label>Region(s) included in this project</label>
                                  <div class="checkbox">
                                      <label>
                                        <input type="checkbox" name="regions" value="asia">
                                        Asia
                                      </label>
                                  </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="regions" value="sub saharan africa">
                                        Sub-Saharan Africa
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="regions" value="latin america">
                                        Latin America
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="regions" value="middle east">
                                        Middle East
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="regions" value="caribbean">
                                        Caribbean
                                    </label>
                                 </div>
                              </div>
                              <div class="form-group">
                                  <label>Research Themes *</label>
                                  <div class="checkbox">
                                      <label>
                                        <input type="checkbox" name="themes" value="Them 1:Motivations (Incentives and Ideologies) ">
                                        Theme 1: Motivations (Incentives and Ideologies)
                                      </label>
                                  </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="themes" value="Theme 2: Infrastructures and Technologies">
                                         Theme 2: Infrastructures and Technologies
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="themes" value="">Other
                                         Theme 3: Communities of Practice in Open and Collaborative Science
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="themes" value="Theme 4: Potential Impacts (Positive and Negative) of Open and Collaborative Science">
                                         Theme 4: Potential Impacts (Positive and Negative) of Open and Collaborative Science
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="themes" value="">
                                        Other
                                    </label>
                                     <input type="text" class="form-control" id="other" placeholder="">
                                 </div>
                              </div>
                              <div class="form-group">
                                <label for="projectTitle">Justification of Research Themes</label><br/>
                                <label for="projectTitle">Justify how your project ties into the selected OCSDNet theme(s).</label>
                                <textarea class="form-control" name="justifythemes" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="projectTitle">Total Budget Cost (CAD)</label>
                                <input type="text" name="budget" class="form-control" id="project-title" placeholder="">
                              </div>
                              <button type="submit" class="btn btn-default">Save</button>
                            </form>
                        </section>
                        <h3>Team & Institution Info</h3>
                        <section class="multi-one">
                           <!-- <h3>Research Team and Institutional Information</h3>
                            <h3>Primary Researcher Information</h3>-->
                             <!-- multistep form -->
                            <form id="msform" class="researcher-info">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active">Primary Researcher Info</li>
                                    <li>Research Team Info</li>
                                    <li>Proposed Institution</li>
                                    <li>Participating Institutions</li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <h2 class="fs-title">Research Team and Institutional Information</h2>
                                    <h3 class="fs-subtitle">Primary Researcher Information</h3>
                                    <div class="col-md-6">
                                    <label for="pdName">Name</label><br/>
                                    <input type="text" name="researchername" placeholder="" />
                                    <label for="pdEmail">Email</label><br/>
                                    <input type="email" name="email" placeholder="" />
                                    <label for="pdPhoneNumber">Phone Number</label><br/>
                                    <input type="number" name="phone" placeholder="" />
                                    <label for="pdD">Designation</label><br/>
                                    <input type="text" name="designation" placeholder="" />
                                    <label for="pdIoRn">Institution or organization name</label><br/>
                                    <input type="text" name="institution" placeholder="" />
                                    <label for="pdCoCi">Country of Citizenship</label><br/>
                                    <input type="text" name="country" placeholder="" />
                                    <label for="pdOa">Office Address</label><br/>
                                    <textarea name="address" placeholder="" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="pd">IDRC Affiliation (if any)</label><br/>
                                    <input type="text" name="affliation" placeholder="" />

                                    <label for="pd">Website</label><br/>
                                    <input type="text" name="website" placeholder="" />
                                    <label for="pdCoI">Country of incorporation</label><br/>
                                    <input type="text" name="countryincorporation" placeholder="" />
                                    <label for="pdCoR">Country of Residence</label><br/>
                                    <input type="text" name="countryresidence" placeholder="" />
                                    <label for="pdGender">Gender</label><br/>
                                    <label class="radio-inline">
                                      <input type="radio" name="gender" id="pdMale" value="option1"> Male
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="gender" id="pdFemale" value="option2"> Female
                                    </label><br/>
                                    <label for="pdAoEaI">Areas of Expertise and Interest</label><br/>
                                    <input type="text" name="expertise" placeholder="" />
                                    <label for="pdRPoRO">Relevant Publications or Research Outputs</label><br/>
                                    <input type="text" name="publications" placeholder="" />
                                    </div>
                                    <p>Qualifications and Experience</p>
                                    <p>Please upload an up-to-date curriculum vitae (CV). Your CV should include a chronological list of your work experience, qualifications,
credentials, funded research projects (including those supported by the IDRC), language skills (spoken and written) and relevant publications.</p>
                                    <a class="btn btn-default ">Download CV Template</a>
                                    <a class="btn btn-default ">Upload</a><br/>
                                    <button type="submit" class="btn btn-default">Save</button>
                                    <!--<input type="button" name="previous" class="previous action-button" value="Previous" />-->
                                    <input type="button" name="RTI" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <h2 class="fs-title">Research Team and Institutional Information</h2>
                                    <h3 class="fs-subtitle">Add Collaborators</h3>
                                    <div class="col-md-6">
                                    <label for="pdName">Name</label><br/>
                                    <input type="text" name="fname" placeholder="" />
                                    <label for="pdEmail">Email</label><br/>
                                    <input type="email" name="pdEmail" placeholder="" />
                                    <label for="pdPhoneNumber">Phone Number</label><br/>
                                    <input type="number" name="pdphone" placeholder="" />
                                    <label for="pdD">Designation</label><br/>
                                    <input type="text" name="pdD" placeholder="" />
                                    <label for="pdIoRn">Institution or organization name</label><br/>
                                    <input type="text" name="pdIoRn" placeholder="" />
                                    <label for="pdCoCi">Country of incorporation</label><br/>
                                    <input type="text" name="pdCoCi" placeholder="" />
                                    <label for="pdOa">Office Address</label><br/>
                                    <textarea name="pdOa" placeholder="" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="pd">IDRC Affiliation (if any)</label><br/>
                                    <input type="text" name="pd" placeholder="" />
                                    <label for="pdCoc">Country of Citizenship</label><br/>
                                    <input type="text" name="pdCoC" placeholder="" />
                                    <label for="pd">Website</label><br/>
                                    <input type="text" name="pdWebsite" placeholder="" />
                                    <label for="pdCoI">Country of incorporation</label><br/>
                                    <input type="text" name="pdCoI" placeholder="" />
                                    <label for="pdCoR">Country of Residence</label><br/>
                                    <input type="text" name="pdCoR" placeholder="" />
                                    <label for="pdGender">Gender</label><br/>
                                    <label class="radio-inline">
                                      <input type="radio" name="inlineRadioOptions" id="pdMale" value="option1"> Male
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="inlineRadioOptions" id="pdFemale" value="option2"> Female
                                    </label><br/>
                                    <label for="pdAoEaI">Areas of Expertise and Interest</label><br/>
                                    <input type="text" name="pdAoEaI" placeholder="" />
                                    <label for="pdRPoRO">Relevant Publications or Research Outputs</label><br/>
                                    <input type="text" name="pdRPoRO" placeholder="" />
                                    </div>
                                    <p>Qualifications and Experience</p>
                                    <p>Please upload an up-to-date curriculum vitae (CV). Your CV should include a chronological list of your work experience, qualifications,
credentials, funded research projects (including those supported by the IDRC), language skills (spoken and written) and relevant publications.</p>
                                    <a class="btn btn-default ">Download CV Template</a>
                                    <a class="btn btn-default ">Upload</a><br/>
                                    <p>Role in Proposed Project</p>
                                    <p>Please explain the specific role that this person will play in the proposed project</p><br/>
                                    <textarea name="pdOa" placeholder="" rows="3"></textarea><br/>
                                    <hr/>
                                    <a class="btn btn-default ">Add New Collaborator</a><br/>

                                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                                    <a class="btn btn-default">Save</a>
                                    <input type="button" name="RTI" class="next action-button" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <h2 class="fs-title">Research Team and Institutional Information</h2>
                                    <h3 class="fs-subtitle">Proposing Institution</h3>
                                    <p>The proposing institution receives and manages the project funds provided by the IDRC. Please indicate the contact information of
the administration office to which funds may be dispensed should this application be accepted.</p>
                                    <div class="col-md-10 no-margin">
                                    <label for="piION">Institution/ Organization name</label><br/>
                                    <input type="text" name="fname" placeholder="" />
                                    <label for="piMA">Mailing Address</label><br/>
                                    <label for="pdiMA">Including office or departmental name</label><br/>
                                    <input type="text" name="pdEmail" placeholder="" />
                                    <label for="piTN">Telephone Number</label><br/>
                                    <input type="number" name="piphone" placeholder="" />
                                    <label for="piE">Email</label><br/>
                                    <input type="text" name="piE" placeholder="" />
                                    <textarea name="pdOa" placeholder="" rows="3"></textarea>
                                    <label for="piFoN">Finance Officer’s name</label><br/>
                                    <label for="piFoN">Name for the main point of contact for financialse</label><br/>
                                    <input type="text" name="piFoN" placeholder="" />
                                    <label for="piFoPN">Finance Officer phone number</label><br/>
                                    <label for="piFoPN">Phone number for the main point of contact for financials</label><br/>
                                    <input type="text" name="piFoPN" placeholder="" />
                                    <label for="piFoE">Finance Officer Email</label><br/>
                                    <label for="piFoR">Email address for the main point of contact for financials</label><br/>
                                    <input type="text" name="piFoE" placeholder="" />

                                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                                    <a class="btn btn-default">Save</a>
                                    <input type="button" name="RTI" class="next action-button" value="Next" />
                                    </div><br/>
                                </fieldset>
                                <fieldset>
                                    <h2 class="fs-title">Research Team and Institutional Information</h2>
                                    <h3>Participating Institutions</h3>
                                    <p>Participating institutions put forward the research proposal under the leadership of the proposing institution. Note that all funding will
be disbursed directly to the proposing institution only.</p>
                                    <div class="col-md-10 no-margin">
                                    <label for="pi3IN">Institution name</label><br/>
                                    <input type="text" name="pi3IN" placeholder="" />
                                    <label for="pi3TN">Telephone Number </label><br/>
                                    <input type="number" name="pdEmail" placeholder="" />
                                    <label for="pi3E">Email</label><br/>
                                    <input type="email" name="pi3E" placeholder="" />
                                    <textarea name="pdOa" placeholder="" rows="3"></textarea>
                                    <label for="pi3MA">Mailing Address</label><br/>
                                    <label for="pi3MA">Including office or departmental name</label><br/>
                                    <input type="text" name="pi3MA" placeholder="" />
                                    <label for="pi3MA">Role in the project</label><br/>
                                    <textarea name="pi3MA" placeholder="" rows="3"></textarea><br/>
                                    <hr/>
                                    <a class="btn btn-default ">Add New Institution</a><br/>
                                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                                    <a class="btn btn-default">Save</a>
                                    <input type="button" name="RTI" class="next action-button" value="Next" />
                                    </div><br/>
                                </fieldset>
                            </form>

                        </section>
                        <h3>Proposed Study Info</h3>
                        <section>
                            <form role="form" class="proposed-study-info">
                              <div class="form-group">
                                <label for="researcherName">Research Project Abstract </label><br/>
                                <p>Should not exceed 250 words</p>
                                <textarea name="researchproject"class="form-control" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="researcherName">Research Problem, Significance and Justification </label><br/>
                                <p>WORD LIMIT: 1,000. Please provide a brief overview of relevant literature and highlight the knowledge gaps that this project will address. Indicate the size
and scope of the problem, as well as how the problem relates to the purpose and goals OCSDNet; broader national development priorities, and the research
and capacity needs of the countries involved.</p>
                                <textarea name="researchproblem" class="form-control" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="researcherName">Research Questions and Objectives</label><br/>
                                <p>WORD LIMIT: 500. Outline your project’s central research question(s), subquestions, and objectives. There must be congruency between the questions,
objectives, research design and methods. You should highlight how the study’s questions and objectives will contribute to the research themes of the
OCSDNet.</p>
                                <textarea name="researchquestions" class="form-control" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="researcheDandM">Research Design and Methods</label><br/>
                                <p>WORD LIMIT: 1,000. In this section, applicants should clearly indicate and justify the proposed study design. You should discuss how you intend to collect
the data that you will need to achieve the study’s objectives and answer the project’s research questions.  You should clearly outline how each data collection
activity will contribute to the study objectives.</p>
                                <textarea name="researchdesign" class="form-control" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="researcherName">Analysis and Synthesis</label><br/>
                                <p>WORD LIMIT: 1,000. Describe how you intend to organize, examine and model data to arrive at conclusions and insights.</p>
                                <textarea name="analysissynthesis" class="form-control" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="researcherName">Outcomes and Outputs</label><br/>
                                <p>WORD LIMIT: 700. Describe the major project outputs and intended outcomes. Your project outputs should creatively reflect the
principles of open and collaborative science.</p>
                                <textarea name="outcomesoutputs" class="form-control" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="researcherName">Knowledge Translation and Dissemination</label><br/>
                                <p>WORD LIMIT: 700. Describe how you will disseminate your outputs. To ensure that the results of your study are applied to address
development challenges, explain how you intend to package, disseminate and promote the application of your findings amongst
relevant stakeholder groups</p>
                                <textarea name="translationdissemination" class="form-control" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="researcherName">Network Connections and Interactions</label><br/>
                                <p>WORD LIMIT: 500. Illustrate how you will contribute to the overall OCSDNet framework and themes. Draw on other initiatives and
approaches discussed at the OCSDNet workshop, if applicable.</p>
                                <textarea name="networkconnetions" class="form-control" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="bibliography">Bibliography</label><br/>
                                <p>APA syle</p>
                                <input type="text" name="bibliography" class="form-control" id="bibliography" placeholder="">
                              </div>
                              <button type="submit" class="btn btn-default">Save</button>
                            </form>
                        </section>
                        <h3>Research Administration</h3>
                        <section>
                            <h2>Research Administration</h2>
                            <form role="form" class="research-administration">
                              <div class="form-group">
                                <label for="projectTimeline">Project Timeline </label><br/>
                                <p>Upload the completed template document and use it to outline the key milestones and deadlines of your project. Each activity included in the schedule should
relate to a project objective and should provide a financial estimate that is corresponds with the proposed budget in Section 5</p>
                                <input type="file" name="projecttimeline" id="projectTimeline">
                              </div>
                              <div class="form-group">
                                <label for="researchEthics">Research Ethics</label><br/>
                                <p>WORD LIMIT: 500. Provide a plan for how you will obtain research ethics approval. All projects that include human subjects must ensure that their privacy,
dignity, and integrity are protected. An independent ethical review committee must approve the protocols. Funding will be contingent on the provision of a
formal written approval. Projects that will collect corporate or personal information must detail how informed consent will be obtained and confidentiality
maintained.</p>
                                <textarea class="form-control" name="researchethics" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="internalPCM">Internal Project Communication and Management</label><br/>
                                <p>WORD LIMIT: 500. Describe how the principal investigator and project collaborators will interact with one another on a regular basis. Explain how funds
will be managed and how administrative matters will be addressed.</p>
                                <textarea class="form-control" name="internalproject" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="ChallengesAndRisks">Challenges and Risks</label><br/>
                                <p>WORD LIMIT: 500. Describe any challenges or foreseeable risks that may arise and affect your project's progress. Explain how your project team will
manage these concerns should they arise. Outline the mechanisms that are in place to cope with any unforeseeable complications.</p>
                                <textarea class="form-control" name="challengesandrisks" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="MandEplan">Monitoring and Evaluation Plan</label><br/>
                                <p>WORD LIMIT: 500. Outline how you will consistently examine and assess your project throughout its life course. Your outline should
include your monitoring and evaluation questions and objectives, as well as a description of your data collection methods and the
data sources that you will use. Your outline should correspond with your project timeline</p>
                                <textarea class="form-control"name="monitoringevaluation" rows="3"></textarea>
                              </div>
                              <button type="submit" class="btn btn-default">Save</button>
                            </form>
                        </section>
                        <h3>Budget</h3>
                        <section>
                            <h2>Budget and Timetable</h2>
                            <form role="form">
                              <div class="form-group">
                               <label for="parallelFunds">Parallel Funds</label><br/>
                               <p>Parallel funds are funds for your project that are donated from other international donors or funding agencies. </p><br/>
                               <p>Template</p>
                               <button type="submit" class="btn btn-default">Download</button>
                              </div>
                              <button type="submit" class="btn btn-default">Save</button>
                              <br/>
                              <br/>
                              <h2>Add Parallel Funding Source</h2>
                              <div class="form-group">
                                <label for="donor">Donor</label>
                                <input type="text" class="form-control" id="donor" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="currency">Currency</label>
                                <input type="text" class="form-control" id="currency" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="timeFrame">Timeframe</label>
                                <input type="text" class="form-control" id="timeFrame" placeholder="">
                              </div>
                              <hr/>
                              <button type="submit" class="btn btn-default">Add new funding source</button>
                              <br/>
                              <br/>
                              <hr/>
                              <button type="submit" class="btn btn-default">Save</button>
                            </form>

                        </section>
                    </div>
                </div>
            </div>
         </div>
     </section>

    <div class="footer">
      <div class="container">
        <p class="text-muted">ocsdnet</p>
      </div>
    </div>
    <script src="<?php echo base_url();?>public/new/js/jquery.js"></script>
    <script src="<?php echo base_url();?>public/new/js/jquery.steps.min.js"></script>

    <script>
            $("#wizard").steps({
                                headerTag: "h3",
                                bodyTag: "section",
                                transitionEffect: "slideLeft",
                                titleTemplate: '<span class="numbers">Step#index#.</span><br/><p class="titlle">#title#</p>',
                                autoFocus: false,
                                  labels: {
                                    cancel: "Cancel",
                                    current: "",
                                    pagination: "Pagination",
                                    finish: "Finish",
                                    next: "Next",
                                    previous: "Prev",
                                    loading: "Loading ..."
                                }
                                });
    </script>

    <script src="<?php echo base_url();?>public/new/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>public/new/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
     <script src="<?php echo base_url();?>public/new/js/custom/osdnet_validator.js"></script>
    <script src="<?php echo base_url();?>public/new/js/jquery.prettyPhoto.js"></script>
    <!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/new/js/main.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>public/new/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
