@extends('layouts.admin')
@section('content')
<style>
  h3{padding:15px;}
  .form-navigation{ margin-top:20px}
  .form-section{
    padding-left:15px;
    display:none;
  }
  .form-section.current{
    display:inherit;
  }
  .parsley-error-list{
    margin:2px 0 3px;
    padding:0;
    list-style-type: none;
    color:red;
  }
</style>
<section class="content-header">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header-text-white bg-info">
              <h3>Multi Step Form</h3>              
          </div>
          <div class="card-body">
            <form method="post" action="{{route('admin.users.formSubmit')}}" class="contact-form">
              @csrf
              <div class="form-section">
                  <label for="firstname">First Name:</label>
                  <input type="text" name="firstname" class="form-control" required />
                  <label for="firstname">Last Name:</label>
                  <input type="text" name="lastname" class="form-control" required />
              </div>
              <div class="form-section">
                  <label for="email">Email:</label>
                  <input type="text" name="email" class="form-control" required />
                  <label for="phone">Phone:</label>
                  <input type="text" name="phone" class="form-control" required />
              </div>
              <div class="form-section">
                  <label for="msg">Message:</label>
                  <textarea class="form-control" name="msg" required></textarea>
              </div>
              <div class="form-navigation">
                 <button type="button" class="previous btn btn-info float-left">Previous</button>
                 <button type="button" class="next btn btn-info float-right">Next</button>
                 <button type="submit" class="btn btn-success float-right">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<section>
@endsection
  @section('customjs')
  <script>
    var $section = $('.form-section');
    function navigateTo(index){
      $section.removeClass('current').eq(index).addClass('current');
      $('.form-navigation .previous').toggle(index > 0);
      var atTheEnd = index >= $section.length - 1;
      $('.form-navigation .next').toggle(!atTheEnd);
      $('.form-navigation [type=submit]').toggle(atTheEnd);
    }

    function curIndex(){
      return $section.index($section.filter('.current'));      
    }

    $('.form-navigation .previous').click(function(){
      navigateTo(curIndex() - 1);
    });

    $('.form-navigation .next').click(function(){
      $('.contact-form').parsley().whenValidate({
        group:'block-'+curIndex()
      }).done(function(){
        navigateTo(curIndex()+1);
      })
    });

    $section.each(function(index,section){
      $(section).find(':input').attr('data-parsley-group','block'+index);
    });
    navigateTo(0);

  </script>
@endsection