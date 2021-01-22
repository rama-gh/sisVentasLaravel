@extends('layouts.app')
@section('content')
      <section class="content">
        <div class="error-page">
          <h2 class="headline text-yellow"> 404</h2>

          <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! No puede acceder a esta página, contactece con el administador.</h3>

            <p>
                No hemos podido encontrar la página que buscabas. Mientras tanto, puede regresar al panel de control, haciendo clip <a href="{{route('home')}}">Aquí</a>
            </p>

            <form class="search-form">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
              <!-- /.input-group -->
            </form>
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
@endsection
