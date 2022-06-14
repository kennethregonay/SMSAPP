
<div class="modal" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Section</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('section/create') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <div class="row">
                            <div class="col">
                                <label for="name">Section Name </label>
                                <input type="text" class="form-control" id="name" name="section_name"
                                    placeholder="Enter Section Name">
                            </div>
                            @error('section_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <div class="col">
                                <label for="name">Type of Section </label>
                                <select class="form-select" style="margin-bottom: 20px;" name="section_type">
                                    <option selected value=""></option>
                                    <option value="Pilot" selected="">Pilot Section</option>
                                    <option value="Regular">Regular Section</option>
                                </select>
                                @error('section_type')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="glevel">Grade Level</label>
                        <select class="form-select" style="margin-bottom: 20px;" name="glevel">
                            <option selected value=""> </option>
                            <option value="Kindergarten" selected="">Kindergarten</option>
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2" >Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4" >Grade 4</option>
                            <option value="Grade 5">Grade 5</option>
                            <option value="Grade 6" >Grade 6</option>
                        </select>
                    </div>
                    @error('glevel')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                  @enderror
                    <div class="mb-2">
                        <label for="glevel">Adviser</label>
                        <select class="form-select" style="margin-bottom: 20px;" name="adviser">                 
                            @foreach ($teachers as $teacher)
                           <option value="{{ $teacher->name }}">{{ $teacher->name  }}</option>
                           @endforeach 
                        </select>
                    </div>
                    @error('adviser')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Add Section</button>
                        <a class="btn btn-danger" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
