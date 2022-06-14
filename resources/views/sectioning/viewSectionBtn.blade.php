@foreach ($advisers as $adviser )
    <div class="modal" id="viewSection{{ $adviser->section->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"> View Section Details </h2></button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('section/update') }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label for="sectionName">Section Name</label>
                            <input type="text" class="form-control" id="sectionName" value = "{{ $adviser->section->name }}" name="sectionName"
                                placeholder="Enter Section Name" readonly>
                            @error('sectionName')
                                <p class="text-danger" style="font-size: .8rem;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="gradeLevel">Grade Level</label>
                            <select name="gradeLevel" id="gradeLevel" class="form-control" disabled >
                                <option selected value="">{{ $adviser->section->glevel }}</option>
                                <option value="Kindergarten">Kindergarten</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 2">Grade 2</option>
                                <option value="Grade 3">Grade 3</option>
                                <option value="Grade 4">Grade 4</option>
                                <option value="Grade 5">Grade 5</option>
                                <option value="Grade 6">Grade 6</option>
                            </select>
                            @error('gradeLevel')
                                <p class="text-danger" style="font-size: .8rem;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="classType">Class Type</label>
                            <select name="classType" id="classType" class="form-control" disabled>
                                <option selected value="">{{ $adviser->section->type }}</option>
                                <option value="Pilot">Pilot Class</option>
                                <option value="Regular">Regular Class</option>
                            </select>
                            @error('classType')
                                <p class="text-danger" style="font-size: .8rem;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="adviser">Adviser</label>
                            <select name="adviser" id="adviser" class="form-control" disabled>
                                <option selected value="">{{$adviser->name }}</option>
                            </select>
                            @error('adviser')
                                <p class="text-danger" style="font-size: .8rem;">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="number" name="num" id="num" hidden>
                        <div class="modal-footer">
                            {{-- <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Update Section</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
