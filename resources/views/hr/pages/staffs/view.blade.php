
                                        <div class="modal-body">
                                            <table class="table container table-striped table-inverse">
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row" style="text-transform: uppercase">Staff ID:</td>
                                                            <td style="text-transform: uppercase">{{ $staff->staff_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Name:</td>
                                                            <td style="text-transform: capitalize">{{ $staff->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Email</td>
                                                            <td>{{ $staff->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Phone Number</td>
                                                            <td >{{ $staff->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Date of Birth:</td>
                                                            <td >{{ date('d M, Y', strtotime($staff->dob)) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row" style="text-transform: capitalize">Department</td>
                                                            <td style="text-transform: capitalize">{{ $staff->department }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row" style="text-transform: capitalize">Faculty:</td>
                                                            <td style="text-transform: capitalize" >{{ $staff->faculty }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row" style="text-transform: capitalize">Job Title:</td>
                                                            <td style="text-transform: capitalize">{{ $staff->job_title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row" style="text-transform: capitalize">Salary Scale</td>
                                                            <td style="text-transform: capitalize">{{ $staff->salary_scale }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">Appointment Date:</td>
                                                            <td >{{ date('d M, Y', strtotime($staff->appointment_date)) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row" style="text-transform: capitalize">Terms of Service:</td>
                                                            <td >{{ $staff->terms_of_service }}</td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>
