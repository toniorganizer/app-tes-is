<!-- Your modal -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Select2 in Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Your search form -->
          <form>
            <div class="form-group">
              <label for="searchInput">Search:</label>
              <input type="text" class="form-control" id="searchInput" name="searchInput" placeholder="Enter your search">
            </div>
          </form>
  
          <!-- Dropdown with Select2 -->
          <select class="selectpicker" id="mySelect" name="mySelect" data-live-search="true">
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
            <!-- Add more options as needed -->
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Activate Select2 for the dropdown -->
  <script>
    $(document).ready(function(){
      $('#mySelect').select2();
    });
  </script>
  