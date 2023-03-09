@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center" style="background-color: #ADA2FF;">{{ __('ยินดีต้อนรับ') }}</div>
                <div class="card-body">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('/1.jpg') }}" class="d-block w-100" width=320 height=380 alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('/2.jpg') }}" class="d-block w-100" width=320 height=380 alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('/12.jpg') }}" class="d-block w-100" width=320 height=380 alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('/13.jpg') }}" class="d-block w-100" width=320 height=380 alt="...">
                            </div>
                        </div>


                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        {{ __('ยินดีต้อนรับ') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <h4>ยินดีต้อนรับเข้าสู่ร้านสมรักษ์พาเซ</h4>
            <h5>ติดต่อ สอบถาม </h5>
            <div class="col">
                เบอร์โทร : 061277017
                <br>
                <a href="https://line.me/ti/p/fUdOHyMKSR">
                    <i class='fab fa-line' style='font-size:40px;color:green'></i>
                    &nbsp;
                </a>

                <a href="https://instagram.com/bumbim61?igshid=YmMyMTA2M2Y=">
                    <i class='fab fa-instagram' style='font-size:40px;color:red'></i>
                </a>
                <p>กดShop เข้าหน้าสินค้ากันเลย</p>
                <p>คำเตือน แอดไลน์ก่อนเข้าใช้บริการ เพื่อความสะดวก</p>

            </div>
        </div>

    </div>
</div> -->

<section>
  <div class="pt-5"
    style="
    background: #F8CBA6; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#F8CBA6, #FFFBEB); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#F8CBA6, #FFFBEB); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#F8CBA6, #FFFBEB); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#F8CBA6, #FFFBEB); /* Standard syntax */

     height: 100hv;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="card mask-custom py-5 text-white">
              <div class="card-body">
                <img class="rounded-circle shadow-2-strong mb-5"
                  src="{{ asset('/สมรักษ์ พาเซ.png') }}" alt="avatar" style="width: 150px;"
                  data-mdb-toggle="animation" data-mdb-animation-start="onLoad" data-mdb-animation="fade-in-down"
                  data-mdb-animation-duration="1000" data-mdb-animation-delay="200">
                <h5 class="mb-4 text-dark" data-mdb-toggle="animation" data-mdb-animation-start="onLoad"
                  data-mdb-animation="fade-in-down" data-mdb-animation-duration="1000" data-mdb-animation-delay="300">
                  Admin</h5>
                <p class="mb-4 text-dark" data-mdb-toggle="animation" data-mdb-animation-start="onLoad"
                  data-mdb-animation="fade-in-down" data-mdb-animation-duration="1000" data-mdb-animation-delay="400">
                  ติดต่อแอดมิน
                <br> เบอร์โทร : 061277017</p>
                <ul class="list-unstyled mb-0">
                <a href="https://line.me/ti/p/fUdOHyMKSR">
                    <i class='fab fa-line' style='font-size:40px;color:green'></i>
                    &nbsp;
                </a>
                <a href="https://instagram.com/bumbim61?igshid=YmMyMTA2M2Y=">
                    <i class='fab fa-instagram' style='font-size:40px;color:red'></i>
                </a>
                </ul>
                <br>
                <p class="mb-4 text-danger" data-mdb-toggle="animation" data-mdb-animation-start="onLoad"
                  data-mdb-animation="fade-in-down" data-mdb-animation-duration="1000" data-mdb-animation-delay="400">
                  สามารถติดต่อสอบถามทางร้านได้ทางช่องทางนี้
                หรือดูสินค้าอื่นในช่องทางต่างๆ</p>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

</section>

@endsection