@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="mt-3">List of Section</h3>
        <hr style="height: 4px;color: rgb(0,0,0);">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add"><span
                        class="fa fa-plus"></span>Add Section
                </a>
            </div>
            <div class="card-body">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#kinder">
                                <h3>Kindergarten</h3>
                            </a>
                        </div>
                        <div id="kinder" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Diamond | Pilot</td>
                                            <td>Mrs. Mary Virgo</td>
                                            <td>30</td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#edit">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirm">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#grade1">
                                <h3>Grade 1</h3>
                            </a>
                        </div>
                        <div id="grade1" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-resposive table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 30%;">Section Name and Type</th>
                                            <th style="width: 30%;">Section Adviser</th>
                                            <th style="width: 20%;">Number of Student</th>
                                            <th style="width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Section --}}
    <div class="modal" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Section</h2></button>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <div class="mb-2">
                            <label for="sectionName">Section Name</label>
                            <input type="text" class="form-control" id="sectionName" name="sectionName"
                                placeholder="Enter Section Name">
                        </div>
                        <div class="mb-2">
                            <label for="gradeLevel">Grade Level</label>
                            <select name="gradeLevel" id="gradeLevel" class="form-control">
                                <option selected hidden></option>
                                <option value="Kindergarten">Kindergarten</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="classType">Class Type</label>
                            <select name="classType" id="classType" class="form-control">
                                <option selected hidden></option>
                                <option value="Pilot">Pilot Class</option>
                                <option value="Regular">Regular Class</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="adviser">Adviser</label>
                            <select name="adviser" id="adviser" class="form-control">
                                <option selected hidden></option>
                                <option value="">Cyrel Pellosis</option>
                                <option value="">Kenneth Regonay</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Add Section</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Dontation --}}
    <div class="modal" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Edit Section</h2>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <div class="mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                        </div>

                        <div class="mb-2">
                            <label for="donation">Donation</label>
                            <textarea class="form-control" id="description" name="donation" placeholder="Enter donation"></textarea>
                        </div>

                        <div class="mb-2">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Name">
                        </div>

                        <div class="mb-2">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation --}}
    <div class="modal" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Confirmation</h2>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <div class="mb-2">
                            <p>Are you sure you want to continue?</p>
                        </div>
                        <div class="modal-footer = 2">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Confirm</button>
                            <pre>
                                <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
