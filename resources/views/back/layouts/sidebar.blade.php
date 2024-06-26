@php use Illuminate\Support\Facades\Auth; @endphp
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                       data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}<span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="{{ route('admin.profile.index') }}" class="dropdown-item"><i class="ti-user"></i>
                            My Profile
                        </a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ti-power-off"></i> Log out
                            </button>
                        </form>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.index') }}" aria-expanded="false">
                        <i class="icon-speedometer"></i>
                        <span class="hide-menu">
                            Home
                        </span>
                    </a>
                </li>
                @if(Auth::user()->role == 0)
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.settings') }}" aria-expanded="false">
                            <i class="icons-Gears"></i>
                            <span class="hide-menu">
                            Settings
                        </span>
                        </a>
                    </li>
                    <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-account-card-details"></i><span class="hide-menu">Users</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('admin.users.index') }}">
                                    Users
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.create') }}">
                                    Add New User
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->role <= 1)
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="icon-speedometer"></i><span class="hide-menu">Campaigns</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('admin.campaigns.index') }}">
                                    Campaigns
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.campaigns.create') }}">
                                    Create Campaign
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.messages.index') }}"
                           aria-expanded="false">
                            <i class="icon-envelope"></i>
                            <span class="hide-menu">
                            Messages
                        </span>
                        </a>
                    </li>
                    <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="icon-question"></i><span class="hide-menu">
                            FAQ
                        </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('admin.faq.index') }}">
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.faq.create') }}">
                                    Create FAQ
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.subscribers.index') }}"
                           aria-expanded="false">
                            <i class="icon-people"></i>
                            <span class="hide-menu">
                            Subscribers
                        </span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-account-multiple"></i><span class="hide-menu">
                            Staff
                        </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('admin.staff.index') }}">
                                    Staff
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.staff.create') }}">
                                    Add New
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.categories.index') }}"
                           aria-expanded="false">
                            <i class="ti-folder"></i>
                            <span class="hide-menu">
                            Categories
                        </span>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.tags.index') }}"
                           aria-expanded="false">
                            <i class="mdi mdi-tag-multiple"></i>
                            <span class="hide-menu">
                            Tags
                        </span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-shopping-cart-full"></i><span class="hide-menu">
                            Products
                        </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('admin.products.index') }}">
                                    Products
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.products.create') }}">
                                    Create Product
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->role == 2)
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('admin.cart') }}"
                           aria-expanded="false">
                            <i class="mdi mdi-cart-plus"></i>
                            <span class="hide-menu">
                            Cart
                        </span>
                        </a>
                    </li>
                @endif
                <li>
                    <a class="waves-effect waves-dark" href="@if(Auth::user()->role < 2) {{ route('admin.orders.all') }}
                    @else {{ route('admin.orders.index') }} @endif" aria-expanded="false">
                        <i class="ti-shopping-cart-full"></i>
                        <span class="hide-menu">
                            Orders
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
