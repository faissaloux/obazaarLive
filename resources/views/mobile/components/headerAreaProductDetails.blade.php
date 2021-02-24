<!-- Back Button-->
<div class="m-2 d-flex justify-content-between">
  <div class="back-button">
    <a href="{{ route('mobile.store.goBack', ['store' => \Session::get('store') ]) }}">
      <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
      </svg>
    </a>
  </div>
  <!-- Page Title-->
  <div class="page-heading">
    <h6 class="mb-0">Product Details</h6>
  </div>
</div>