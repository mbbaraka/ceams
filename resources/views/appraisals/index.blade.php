@extends('layouts.app')

@section('title')
Appraisal Form
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header pt-1 pb-1">
            <h3 class="card-title text-custom">
                Staff Appraisal Form
                <a target="_blank" href="{{ route('print') }}" class="btn btn-sm btn-primary float-right"><span class="fa fa-print"></span> Print Form</a>
            </h3>
          </div>
          <div class="card-body">
              <h2>STAFF PERFORMANCE REPORT APPRAISAL FORM FOR ACADEMIC STAFF</h2>
              <strong>Performance Assessment Report for the Period ended: {{date('d M, Y') }}</strong>
              <br><br>
              <h4>Introduction</h4>
              <p>
                  Staff Performance Assessment id part of the Performance Management System of Muni University.
                  It is used as a management tool for establishing the extent to which set targets within overall mandates of the university are achieved.
                  trhough staff performance evaluation, performance gaps and development needs of an individual employee are identified.
                  The evaluation process offers an opportunity to the staff and Supervisors to dialogue and as well as obtain a feedback on performance. It is
                  our call as a Univeristy to encourage participatory approach to the evaluation process and consistence in filling this form.
              </p>
              <strong>Perion of Assessment: 01 January 2020 to 31 Decemeber 2020</strong>
              <br><br><br>
              <h4>Section A</h4>
              <strong>1.0 Staff Particulars</strong>
                    <table class="table table-responsive-sm">
                      <tbody>
                          <tr>
                              <td width="30%">Name of Appraisee :</td>
                              <td>{{ Auth::user()->name }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Date of Birth :</td>
                            <td>{{ date('d M, Y', strtotime(Auth::user()->dob)) }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Department :</td>
                            <td>{{ Auth::user()->department }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Faculty :</td>
                            <td>{{ Auth::user()->faculty }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Job Title :</td>
                            <td>{{ Auth::user()->job_title }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Salary Scale :</td>
                            <td>{{ Auth::user()->salary_scale }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Date of Appointment :</td>
                            <td>{{ Auth::user()->appointment_date }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Terms of Service :</td>
                            <td><span class="badge badge-info">{{ Auth::user()->terms_of_service }}</span></td>
                          </tr>
                          <tr>
                            <td width="30%">Email Address :</td>
                            <td>{{ Auth::user()->email }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Phone :</td>
                            <td>{{ Auth::user()->phone }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Name of Appraiser/Supervisor :</td>
                            <td>{{ Auth::user()->appraiser->name }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Job Title/Rank :</td>
                            <td>{{ Auth::user()->appraiser->job_title }}</td>
                          </tr>
                          <tr>
                            <td width="30%">Salary Scale :</td>
                            <td>{{ Auth::user()->appraiser->salary_scale }}</td>
                          </tr>
                      </tbody>
                    </table>

             <br><br>
              <strong>2.0 ACHIEVEMENTS OF ACADEMIC STAFF IN YEAR UNDER REVIEW</strong>
              <br>
              <strong>PART A: Studies Undertaken </strong>
              <table class="table table-responsive-sm">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Course</th>
                          <th>Institution</th>
                          <th>Expected Award</th>
                          <th>Date of Completion</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>IT Essentials</td>
                          <td>Muni University</td>
                          <td>Certificate</td>
                          <td>20/April/2020</td>
                      </tr>
                  </tbody>
              </table>
              <br><br><br>
              <h4>SECTION B: ASSESSMENT OF THE LEVEL OF ACHIEVEMENT OF AGREED OUTPUTS AND TARGETS</h4>
              <table class="table table-responsive-sm">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Key Outputs</th>
                          <th>Performance Indicators</th>
                          <th>Performance Indicators</th>
                          <th>Performance Level</th>
                          <th>Comment</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Job description one</td>
                          <td>performance indicator</td>
                          <td>performance indicator</td>
                          <td>performance level</td>
                          <td>comment</td>
                      </tr>
                  </tbody>
                  <br>
                  <tfoot>
                      <tr>
                          <th colspan="2">Average Score : 87%</th>
                          <th colspan="4">Grade : <strong>OUTSTANDING</strong></th>
                      </tr>
                  </tfoot>
              </table>
              <br><br><br>
              <h4>SECTION C: ASSESSMENT OF CORE COMPETENCIES AND WORK RELATED BEHAVIOUR</h4>
              <table class="table table-responsive-sm">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Competencies and Work Related Behaviour</th>
                          <th>Evaluation Outcome <small>(Performance Level Attained)</small></th>
                          <th>Comments</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Ability to apply professional Skills</td>
                          <td>3</td>
                          <td>Comment goes here</td>
                      </tr>
                  </tbody>
                  <tfoot>
                      <tr>
                          <th colspan="2">Average Score : 88%</th>
                          <th colspan="4">Grade : GOOD</th>
                      </tr>
                  </tfoot>
              </table>
              <br><br><br>
              <h4>SECTION D: OVERALL ASSESSMENT OF PERFORMANCE</h4>
              <table class="table">
                  <tfoot>
                      <tr>
                          <th>KEY RESULTS AREA : 88%</th>
                          <th>COMPETENCIES: 68%</th>
                          <th>OVERALL PERFORMANCE : 79%</th>
                          <th>GRADE : GOOD</th>
                      </tr>
                  </tfoot>
              </table>
              <br><br><br>
              <h4>SECTION E: RECOMMENDATIONS</h4>
              <p>Basing on your performance, you have been recommended the following</p>
              <table class="table table-responsive-sm">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Recommendations</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Confirmation in service/renewal of contract</td>
                      </tr>
                  </tbody>
              </table>

              <br><br><br>
              <h4>SECTION E: PERFORMANCE IMPROVEMENT ACTION PLAN</h4>
              <table class="table table-responsive-sm">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Performance Gaps</th>
                          <th>Agreed Action Plan</th>
                          <th>Time Frame</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Performance gaps specific to the period under assessment 1</td>
                          <td>Agreed action plan to address gap identified</td>
                          <td>2 days</td>
                      </tr>
                  </tbody>
              </table>

              <br><br><br>
              <h4>COMMENTS</h4>
              <strong>Appraisee/Staff</strong>
              <p>
                  This is the staff/appraisee comment
              </p>
              <strong>Signature :  <span class="float-right">Date : 23 April, 2020</span></strong>

              <br><br>

              <strong>Supervisor/Appraiser</strong>
              <p>
                  This is the supervisor comment
              </p>
              <strong>Signature :  <span class="float-right">Date : 23 April, 2020</span></strong>
              <br><br>

              <strong>Faculty Dean</strong>
              <p>
                  This is the staff/appraisee comment
              </p>
              <strong>Signature :  <span class="float-right">Date : 23 April, 2020</span></strong>
              <br><br>

              <strong>University Secretary/Accounting Officer</strong>
              <p>
                  This is the staff/appraisee comment
              </p>
              <strong>Signature :  <span>Date : 23 April, 2020</span></strong>


          </div>
        </div>
      </div>
    </div>
</div>
@endsection
