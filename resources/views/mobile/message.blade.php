<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="home.html">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Live Chat</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <!-- NavBar -->
    @include('mobile/components/navBar')
    <div class="page-content-wrapper">
      <!-- Live Chat Intro-->
      <div class="live-chat-intro mb-3">
        <p>Start a conversation</p><img src="img/bg-img/9.jpg" alt="">
        <div class="status online">We're online</div>
        <!-- Use this code for "Offline" Status-->
        <!-- .status.offline We’ll be back soon-->
      </div>
      <!-- Support Wrapper-->
      <div class="support-wrapper py-3">
        <div class="container">
          <!-- Live Chat Wrapper-->
          <div class="live-chat-wrapper">
            <!-- Agent Message Content-->
            <div class="agent-message-content d-flex align-items-start">
              <!-- Agent Thumbnail-->
              <div class="agent-thumbnail me-2 mt-2"><img src="img/bg-img/9.jpg" alt=""></div>
              <!-- Agent Message Text-->
              <div class="agent-message-text">
                <div class="d-block">
                  <p>Hi there! You can start asking your question below. I am ready to help.</p>
                </div>
                <div class="d-block">
                  <p>How can I help you with?</p>
                </div><span>12:00</span>
              </div>
            </div>
            <!-- User Message Content-->
            <div class="user-message-content">
              <!-- User Message Text-->
              <div class="user-message-text">
                <div class="d-block">
                  <p>I liked your template.</p>
                </div><span>12:18</span>
              </div>
            </div>
            <!-- Agent Message Content-->
            <div class="agent-message-content d-flex align-items-start">
              <!-- Agent Thumbnail-->
              <div class="agent-thumbnail me-2 mt-2"><img src="img/bg-img/9.jpg" alt=""></div>
              <!-- Agent Message Text-->
              <div class="agent-message-text">
                <div class="d-block">
                  <p>Thank you.</p>
                </div><span>12:36</span>
              </div>
            </div>
            <!-- User Message Content-->
            <div class="user-message-content">
              <!-- User Message Text-->
              <div class="user-message-text">
                <div class="d-block">
                  <p>How can I buy this?</p>
                </div><span>12:42</span>
              </div>
            </div>
            <!-- Agent Message Content-->
            <div class="agent-message-content d-flex align-items-start">
              <!-- Agent Thumbnail-->
              <div class="agent-thumbnail me-2 mt-2"><img src="img/bg-img/9.jpg" alt=""></div>
              <!-- Agent Message Text-->
              <div class="agent-message-text">
                <div class="d-block">
                  <div class="writing-mode"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Type Message Form-->
    <div class="type-text-form">
      <form action="#">
        <div class="form-group file-upload mb-0">
          <input type="file"><i class="lni lni-plus"></i>
        </div>
        <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Type your message"></textarea>
        <button type="submit">
          <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
          </svg>
        </button>
      </form>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>