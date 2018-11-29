<!-- Modal Upload Document -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 text-center" style="background-color: white;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <br><br>
        <h2><strong>PASTE YOUR DOCUMENT</strong></h2>
        <form id="submitDoc" method="post" action="/upload-document">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="title">Title of the document</label><br>
        <input name="title" style="width: 100%">
        <br><br>
        <label for="docText">Content of the document</label><br>
        <textarea cols="100" rows="10" name="docText"></textarea><br>
        <input type="radio" name="private"> Private Doc<br>
        <small>Save document link after upload if you're not registered user.</small>
        <br>
        <button class="btn btn-success"><i class="fa fa-upload"></i> Upload Now</button>
        </form>
        <br>
      </div>
    </div>
  </div>
</div>