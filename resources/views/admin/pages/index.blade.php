@extends('admin.master')

@section('content')
              <!-- container -->
      <div class="custom-container">
        <!-- row -->
        <div class="row mb-6 g-6">
          <div class="col-xl-8 col-lg-6">
            <div class="bg-gradient-mixed p-8 py-10 rounded-3 p-lg-7">
              <!--heading-->
              <h1 class="fs-3">👋 Hello APRIFAN,</h1>
              <p class="mb-0">Welcome to your E-commerce Dashboard! Monitor your sales,</p>
              <p>track your progress, and gain valuable insights.</p>
              <a href="#!" class="btn btn-dark">Start AI</a>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6">
            
                      <!-- Add Pagination -->
                      <div class="swiper-pagination"></div>
                      <!-- Add Navigation -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row row-cols-1 row-cols-xl-3 row-cols-md-3 mb-6 g-6">
          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-warning-darker text-warning-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                      <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                      <path d="M17 17h-11v-14h-2" />
                      <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                  </div>
                  <div>Attraction</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $counter['attraction'] }}</div>
                  <div class="text-success small">
                    <a href="{{ route('admin.attraction.index') }}" class="btn btn-info">View Attraction </a>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l6 -6l4 4l8 -8" />
                        <path d="M14 7l7 0l0 7" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-success-darker text-success-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-coin">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                      <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                      <path d="M12 7v10" />
                    </svg>
                  </div>
                  <div>Zona</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $counter['zones'] }}</div>
                  <div class="text-warning small">
                    <a href="{{ route('admin.zones.index') }}" class="btn btn-info">View Zones </a>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l6 -6l4 4l8 -8" />
                        <path d="M14 7l7 0l0 7" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-info-darker text-info-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                      <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                      <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                  </div>
                  <div>Review</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $counter['publishedReviews'] }}</div>
                  <div class="text-danger small">
                    <a href="{{ route('admin.review.index') }}" class="btn btn-info">View Review </a>
                    <span>Unpublished: {{ $counter['unpublishedReviews'] }}</span>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-down">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 7l6 6l4 -4l8 8" />
                        <path d="M21 10l0 7l-7 0" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row g-6 mb-6">
          <div class="col-xl-8 col-12">
            <!-- card -->
            <div class="card card-lg">
              <!--  card body -->
              <div class="card-body d-flex flex-column gap-5">
                <div class="mb-4">
                  <!-- heading -->
                  <h5 class="mb-0">Revenue</h5>
                </div>
                <div class="bg-gray-100 p-3 rounded-3">
                  <ul class="nav nav-pills-white nav-fill" id="chartTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="current-week-tab" data-bs-toggle="pill"
                        data-bs-target="#current-week" type="button" role="tab" aria-controls="current-week"
                        aria-selected="true">
                        <span class="d-flex flex-column">
                          <span class="d-flex align-items-center gap-2">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="currentColor"
                                class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-primary">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                  d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                              </svg></span><span>Total Harga</span>
                          </span>
                          <span class="text-start fs-3 fw-semibold mt-2">Rp.120.000</span>
                        </span>
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="past-week-tab" data-bs-toggle="pill" data-bs-target="#past-week"
                        type="button" role="tab" aria-controls="past-week" aria-selected="false">
                        <span class="d-flex flex-column">
                          <span class="d-flex align-items-center gap-2">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="currentColor"
                                class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-warning">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                  d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                              </svg></span><span>Total Harga Wisata</span>
                          </span>
                          <span class="text-start fs-3 fw-semibold mt-2">Rp.202.000</span>
                        </span>
                      </button>
                    </li>
                  </ul>
                </div>

                <div class="tab-content" id="chartTabsContent">
                  <div class="tab-pane fade show active" id="current-week" role="tabpanel"
                    aria-labelledby="current-week-tab">
                    <div id="totalIncomeChart"></div>
                  </div>
                  <div class="tab-pane fade" id="past-week" role="tabpanel" aria-labelledby="past-week-tab">
                    <div id="totalExpensesChart"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-12">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body">
                <!-- heading -->
                <h5 class="mb-6">NAMA PROVINSI DAERAH</h5>
                <div id="totalSale" class="d-flex justify-content-center"></div>
                <!-- table -->
                <table class="table table-sm table-borderless mb-0 mt-5">
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-primary">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                            </svg>
                          </span>
                          <span class="ms-1">Riau</span>
                        </div>
                      </td>
                      <td class="d-flex justify-content-end gap-2">
                        <span> Rasio Pergi Perjalanan </span>
                        <span class="text-secondary">38.1%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-warning">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                            </svg>
                          </span>
                          <span class="ms-1">Sumatera Utara</span>
                        </div>
                      </td>
                      <td class="d-flex justify-content-end gap-2">
                        <span> Rasio Pergi Perjalanan </span>
                        <span class="text-secondary">28.6%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                            </svg>
                          </span>
                          <span class="ms-1">Sumatera barat</span>
                        </div>
                      </td>
                      <td class="d-flex justify-content-end gap-2">
                        <span> Rasio Pergi Perjalanan </span>
                        <span class="text-secondary"> 23.8% </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                              fill="currentColor"
                              class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-danger">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                            </svg>
                          </span>
                          <span class="ms-1">Jambi</span>
                        </div>
                      </td>
                      <td class="d-flex justify-content-end gap-2">
                        <span> Rasio Pergi Perjalanan </span>
                        <span class="text-secondary"> 9.5% </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row g-6 mb-6">
          <div class="col-xl-8">
            <!-- card -->
            <div class="card card-lg">
              <!-- card header -->
              <div class="card-header border-bottom-0">
                <div>
                  <h5 class="mb-0">Order Destinasi Wisata</h5>
                </div>
              </div>
              <!-- table -->
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 table-centered table-hover">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Harga</th>
                      <th>Wisata</th>
                      <th>Tanggal   </th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>#1</td>
                      <td>Rp:12.000</td>
                      <td>Wisata Kelok 9</td>
                      <td>Jan 20, 2025</td>
                      <td><span class="badge text-info-emphasis bg-info-subtle">Maybe</span></td>
                      <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                    </tr>
                    <tr>
                      <td>#2</td>
                      <td>Rp:10.000</td>
                      <td>Wisata Ulu Kusok</td>
                      <td>Jan 22, 2025</td>
                      <td><span class="badge text-warning-emphasis bg-warning-subtle">Waiting</span></td>
                      <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                    </tr>
                    <tr>
                      <td>#3</td>
                      <td>Rp:20.00</td>
                      <td>Wisata Lembah Harau</td>
                      <td>Jan 18, 2025</td>
                      <td><span class="badge text-danger-emphasis bg-danger-subtle">Cancel</span></td>
                      <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                    </tr>
                    <tr>
                      <td>#4</td>
                      <td>$560</td>
                      <td>Overnight</td>
                      <td>Jan 13, 2025</td>
                      <td><span class="badge text-success-emphasis bg-success-subtle">Completed</span></td>
                      <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                    </tr>
                    <tr>
                      <td>#5</td>
                      <td>$560</td>
                      <td>Overnight</td>
                      <td>Jan 11, 2025</td>
                      <td><span class="badge text-success-emphasis bg-success-subtle">Completed</span></td>
                      <td><a href="#!" class="btn btn-white btn-sm">View</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-4">

        <div class="row g-6 mb-6">
          <div class="col-xl-4">

@endsection
