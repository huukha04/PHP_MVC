
function renderToggleDark() {
    const html = `
<div class="theme-toggle d-flex gap-2 align-items-center mt-2">
    <style>
        .theme-toggle {
            position: fixed;
            bottom: 20px; /* Khoảng cách từ dưới lên */
            right: 20px;   /* Khoảng cách từ trái qua */
            z-index: 9999; /* Đảm bảo phần tử nằm trên cùng */
        }
    </style>
    <!-- Các biểu tượng và phần tử khác -->
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
        role="img" class="iconify iconify--system-uicons" width="20" height="20"
        preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
            stroke-linejoin="round">
            <path
                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                opacity=".3"></path>
            <g transform="translate(-210 -1)">
                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                <circle cx="220.5" cy="11.5" r="4"></circle>
                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
            </g>
        </g>
    </svg>
    <div class="form-check form-switch fs-6">
        <input class="form-check-input" type="checkbox" id="toggle-dark" style="cursor: pointer">
        <label class="form-check-label"></label>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
        role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet"
        viewBox="0 0 24 24">
        <path fill="currentColor"
            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
        </path>
    </svg>
</div>
    `;
    return html;
}

function renderSidebar() {
    const html = `
<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <a href="http://localhost/CO3049_assignment/public/" class="logo text-decoration-none fw-bold fs-2">
            <span >CINEMA</span>
        </a>
        <div class="d-flex justify-content-between align-items-center">
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li class="sidebar-item">
                <a href="http://localhost/CO3049_assignment/public/admin/home" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Home</span>
                </a>
            </li>

            

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-journal-check"></i>
                    <span>Tác vụ chung</span>
                </a>
                
                <ul class="submenu ">
                    <li class="sidebar-item">
                        <a href="http://localhost/CO3049_assignment/public/admin/media" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Media</span>
                        </a> 
                    </li>
                    <li class="sidebar-item">
                        <a href="http://localhost/CO3049_assignment/public/admin/showtime" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Showtime</span>
                        </a> 
                    </li>
                    <li class="sidebar-item">
                        <a href="http://localhost/CO3049_assignment/public/admin/cinema" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Cinema</span>
                        </a> 
                    </li>
                    <li class="sidebar-item">
                        <a href="http://localhost/CO3049_assignment/public/admin/room" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Room</span>
                        </a> 
                    </li>
                    
                </ul>
                

            </li>
            
        </ul>
        
        
    </div>
    
</div>

`;
    return html;
}

function renderFooter() {
    const html = `
<footer class="p-3 bg-transparent">
        <div class="row">
            <!-- Cột 1: Giới thiệu -->
            <div class="col-md-3">
                <h5 class="fw-bold">Về chúng tôi</h5>
                <p class="small">Hệ thống đặt vé xem phim trực tuyến hàng đầu, mang đến trải nghiệm tuyệt vời với những bộ phim mới nhất.</p>
            </div>


            <!-- Cột 3: Chính sách & điều khoản -->
            <div class="col-md-3">
                <h5 class="fw-bold">Chính sách</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class=" ">Điều khoản sử dụng</a></li>
                    <li><a href="#" class=" ">Chính sách bảo mật</a></li>
                    <li><a href="#" class=" ">Quy định chung</a></li>
                </ul>
            </div>

            <!-- Cột 4: Mạng xã hội -->
            <div class="col-md-6">
                <h5 class="fw-bold">Công nghệ</h5>
                <div class="d-flex">
                    <a href="#" class=" me-3 fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class=" me-3 fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="#" class=" me-3 fs-4"><i class="bi bi-twitter"></i></a>
                    <a href="#" class=" fs-4"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>

        <!-- Đối tác -->
        <div class="row text-center">
            <div class="col-12">
                <h6 class="fw-bold">Đối tác</h6>
            </div>
        </div>

        <!-- Bản quyền -->
        <div class="row text-center">
            <div class="col-12">
                <p class="small mb-0">© 2025 CinemaBooking. All Rights Reserved.</p>
            </div>
        </div>
</footer>
`;
    return html;
}

async function renderHeader() {
    let html = `
    <header class="fixed-top p-4 container-lg" style="background-color:rgb(255, 255, 255);">
        <div class="navbar p-0">
            <a href="http://localhost/CO3049_assignment/public/" class="logo text-decoration-none fw-bold fs-2">
                <span>CINEMA</span>
            </a>
    `;

    try {
        const response = await fetch('http://localhost/CO3049_assignment/public/auth/getRole');
        const data = await response.json();

        if (data.status) {
            const role = data.role;
            if (role === 'admin') {
                html += renderAdminHeader();
            } else if (role === 'customer') {
                html += renderCustomerHeader();
            }
        } else {
            html += renderGuestHeader();
        }
    } catch (error) {
        console.error("Lỗi khi fetch role:", error);
        html += renderGuestHeader(); // fallback
    }

    html += `
    
<div class="navbar p-0">
    <div>
        <a href="http://localhost/CO3049_assignment/public/main/cinema" class="text-decoration-none text-primary fw-bold">Rạp</a>
    </div>
    <div class="d-flex gap-4">
        <a href="http://localhost/CO3049_assignment/public/main/contact" class="text-decoration-none text-primary fw-bold">Contact</a>
        <a href="http://localhost/CO3049_assignment/public/main/about" class="text-decoration-none text-primary fw-bold">About</a>
    </div>
</div>
    </header>`;
    return html;
}

function renderAdminHeader() {
    return `
    <div class="d-flex gap-1">
        <a href="http://localhost/CO3049_assignment/public/admin/home" class="btn btn-primary rounded-pill text-white text-decoration-none fw-bold">Quản lí</a>
        <a href="http://localhost/CO3049_assignment/public/auth/logout" class="btn text-decoration-none fw-bold text-danger">Đăng xuất</a>
    </div>
</div>

`;
}

function renderCustomerHeader() {
    return `
    <div class="dropdown">
        <a href="#" class="sidebar-link" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle text-primary fs-2"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="http://localhost/CO3049_assignment/public/customer/profile?display=profileForm"><span>Tài khoản</span></a></li>
            <li><a class="dropdown-item" href="http://localhost/CO3049_assignment/public/customer/profile?display=orderDisplay"><span>Lịch sử mua hàng</span></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="http://localhost/CO3049_assignment/public/auth/logout"><span>Đăng xuất</span></a></li>
        </ul>
    </div>
</div>

`;
}

function renderGuestHeader() {
    return `
    <div class="d-flex gap-1">
        <a href="http://localhost/CO3049_assignment/public/auth/login" class="btn text-primary text-decoration-none fw-bold">Đăng nhập</a>
        <a href="http://localhost/CO3049_assignment/public/auth/register" class="btn btn-primary rounded-pill text-white text-decoration-none fw-bold">Đăng kí</a>
    </div>
</div>

`;
}
