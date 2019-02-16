<!-- start admin -->
<section id="admin">
  <!-- start sidebar -->
  @include('admin.sidebar')
  <!-- end sidebar -->
  <!-- start content -->
  <div class="content">
    <!-- start content head -->
    @include('admin.nav')
    <!-- end content head -->
    <!-- start with the real content -->
    @include('admin.real')
    <!-- end the real content -->
  </div>
  <!-- end content -->
</section>
<!-- end admin -->
