<!-- .app-main -->
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page has-sidebar has-sidebar-fluid has-sidebar-expand-xl">
            <!-- .page-inner -->
            <div class="page-inner page-inner-fill position-relative">
                <header class="page-navs bg-light shadow-sm">
                    <!-- .input-group -->
                    <div class="input-group has-clearable">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button> <label class="input-group-prepend" for="searchClients"><span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span></label> <input type="text" class="form-control" id="searchClients" data-filter=".board .list-group-item" placeholder="Find clients">
                    </div><!-- /.input-group -->
                </header><button type="button" class="btn btn-primary btn-floated position-absolute" data-toggle="modal" data-target="#clientNewModal" title="Add new client"><i class="fa fa-plus"></i></button> <!-- board -->
                <div class="board p-0 perfect-scrollbar">
                    <!-- .list-group -->
                    <div class="list-group list-group-flush list-group-divider border-top" data-toggle="radiolist" id="alluser">
                    </div><!-- /.list-group -->
                </div><!-- /board -->
            </div><!-- /.page-inner -->
            <!-- .page-sidebar -->
            <div class="page-sidebar bg-light">

                <div class="message">
                    <!-- message header -->
                    <div class="message-header">
                        <div class="d-xl-none">
                            <a class="btn btn-light btn-icon" onclick="Looper.toggleSidebar()" href="#"><i class="fa fa-flip-horizontal fa-share"></i></a>
                        </div>
                        <h4 class="message-title"> Invitation: Joe's Dinner @ Fri Aug 22 </h4>
                        <div class="message-header-actions">
                            <!-- invite members -->
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-light btn-icon" title="Invite members" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-plus"></i></button> <!-- .dropdown-menu -->
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-rich stop-propagation">
                                    <div class="dropdown-arrow"></div>
                                    <div class="dropdown-header"> Add members </div>
                                    <div class="form-group px-3 py-2 m-0">
                                        <input type="text" class="form-control" placeholder="e.g. @bent10" data-toggle="tribute" data-remote="assets/data/tribute.json" data-menu-container="#people-list" data-item-template="true" data-autofocus="true"> <small class="form-text text-muted">Search people by username or email address to invite them.</small>
                                    </div>
                                    <div id="people-list" class="tribute-inline stop-propagation"></div><a href="#" class="dropdown-footer">Invite member by link <i class="far fa-clone"></i></a>
                                </div><!-- /.dropdown-menu -->
                            </div><!-- /invite members -->
                            <button type="button" class="btn btn-light btn-icon d-xl-none" data-toggle="sidebar"><i class="fa fa-angle-double-left"></i></button>
                        </div>
                    </div><!-- /message header -->
                    <!-- message body -->
                    <div class="message-body">
                        <!-- .card -->
                        <div class="card card-fluid mb-0">
                            <!-- .conversations -->
                            <div role="log" class="conversations">
                                <!-- .conversation-list -->
                                <ul class="conversation-list">
                                    <!-- .conversation-divider -->
                                    <li class="log-divider">
                                        <span><i class="far fa-fw fa-comment-alt"></i> Chat started by <strong>Diane Peters</strong> · Wed, Feb 14, 2018</span>
                                    </li><!-- /.conversation-divider -->
                                    <!-- .conversation-inbound -->
                                    <li class="conversation-inbound">
                                        <div class="conversation-avatar">
                                            <a href="#" class="tile tile-circle bg-muted"><i class="oi oi-person"></i></a>
                                        </div>
                                        <div class="conversation-message">
                                            <div class="conversation-message-text"> Fuga quis quod voluptas mollitia aliquid alias tenetur. </div>
                                        </div>
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                    </li><!-- /.conversation-inbound -->
                                    <!-- .conversation-inbound -->
                                    <li class="conversation-inbound conversation-faux">
                                        <div class="conversation-message conversation-message-skip-avatar">
                                            <div class="conversation-message-text"> Laboriosam asperiores cupiditate aperiam! </div>
                                            <div class="conversation-meta"> Diane Peters · 20m </div>
                                        </div>
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                    </li><!-- /.conversation-inbound -->
                                    <!-- .conversation-outbound -->
                                    <li class="conversation-outbound">
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                        <div class="conversation-message">
                                            <div class="conversation-message-text"> Expedita officiis delectus perspiciatis a dolores. </div>
                                        </div>
                                    </li><!-- /.conversation-outbound -->
                                    <!-- .conversation-outbound -->
                                    <li class="conversation-outbound conversation-faux">
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                        <div class="conversation-message">
                                            <div class="conversation-message-text"> Consectetur quis. </div>
                                            <div class="conversation-meta"> Beni Arisandi · 14m </div>
                                        </div>
                                    </li><!-- /.conversation-outbound -->
                                    <!-- .conversation-divider -->
                                    <li class="log-divider">
                                        <span><i class="fa fa-fw fa-user-plus"></i> <strong>Jennifer</strong> and <strong>2 others</strong> invited to the chat · 5:06 PM</span>
                                    </li><!-- /.conversation-divider -->
                                    <!-- .conversation-inbound -->
                                    <li class="conversation-inbound">
                                        <div class="conversation-avatar">
                                            <a href="#" class="user-avatar"><img src="assets/images/avatars/uifaces11.jpg" alt=""> <span class="avatar-badge online"></span></a>
                                        </div>
                                        <div class="conversation-message">
                                            <div class="conversation-message-text"> Officiis numquam, repellat nam tempore sit nostrum autem excepturi quis nihil. </div>
                                        </div>
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                    </li><!-- /.conversation-inbound -->
                                    <!-- .conversation-inbound -->
                                    <li class="conversation-inbound conversation-faux">
                                        <div class="conversation-message conversation-message-skip-avatar">
                                            <div class="conversation-message-text has-attachment">
                                                <div class="pswp-gallery">
                                                    <!-- .card-figure -->
                                                    <div class="card card-figure">
                                                        <!-- .card-figure -->
                                                        <figure class="figure">
                                                            <!-- .figure-img -->
                                                            <div class="figure-img figure-attachment">
                                                                <img src="assets/images/dummy/img-5.jpg" alt="Card image cap"> <a href="assets/images/dummy/img-5.jpg" class="img-link" data-size="600x450"><span class="tile tile-circle bg-danger"><span class="oi oi-eye"></span></span> <span class="img-caption d-none">Card image cap</span></a>
                                                            </div><!-- /.figure-img -->
                                                            <figcaption class="figure-caption">
                                                                <ul class="list-inline d-flex text-muted mb-0">
                                                                    <li class="list-inline-item text-truncate mr-auto">Cajun Chicken Egg Pasta </li>
                                                                    <li class="list-inline-item">
                                                                        <button type="button" class="btn btn-reset" title="Download"><span class="oi oi-data-transfer-download"></span></button>
                                                                    </li>
                                                                </ul>
                                                            </figcaption>
                                                        </figure><!-- /.card-figure -->
                                                    </div><!-- /.card-figure -->
                                                </div>
                                            </div>
                                            <div class="conversation-meta"> Jennifer Gray · 13m </div>
                                        </div>
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                    </li><!-- /.conversation-inbound -->
                                    <!-- .conversation-outbound -->
                                    <li class="conversation-outbound">
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                        <div class="conversation-message">
                                            <div class="conversation-message-text has-attachment">
                                                <div class="media align-items-center">
                                                    <span class="fa-stack fa-lg mr-1"><i class="fa fa-square fa-stack-2x text-white"></i> <i class="fa fa-file-pdf fa-stack-1x text-muted"></i></span> <a href="#" class="media-body">double-broccoli-quinoa.pdf</a>
                                                </div>
                                            </div>
                                            <div class="conversation-meta"> Beni Arisandi · 5m </div>
                                        </div>
                                    </li><!-- /.conversation-outbound -->
                                    <!-- .conversation-inbound -->
                                    <li class="conversation-inbound">
                                        <div class="conversation-avatar">
                                            <a href="#" class="tile tile-circle bg-teal">ZF</a>
                                        </div>
                                        <div class="conversation-message">
                                            <div class="conversation-message-text"> Ad earum dolore excepturi itaque officia vel fugiat quo. </div>
                                            <div class="conversation-meta"> Zachary Fowler · 3m </div>
                                        </div>
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                    </li><!-- /.conversation-inbound -->
                                    <!-- .conversation-divider -->
                                    <li class="log-divider">
                                        <span class="text-danger"><i class="oi oi-ban fa-fw"></i> The file sent by <strong>Zachary Fowler</strong> is too large · 2m</span>
                                    </li><!-- /.conversation-divider -->
                                    <!-- .conversation-inbound -->
                                    <li class="conversation-inbound">
                                        <div class="conversation-avatar">
                                            <a href="#" class="tile tile-circle bg-teal">ZF</a>
                                        </div>
                                        <div class="conversation-message">
                                            <div class="conversation-message-text has-attachment">
                                                <div class="media align-items-center">
                                                    <span class="fa-stack fa-lg mr-1"><i class="fa fa-square fa-stack-2x text-muted"></i> <i class="fa fa-file-pdf fa-stack-1x text-white"></i></span> <a href="#" class="media-body">Baked-Chicken-and-Spinach-Flautas.pdf</a>
                                                </div>
                                            </div>
                                            <div class="conversation-meta"> Zachary Fowler · Just now </div>
                                        </div>
                                        <div class="conversation-actions dropdown">
                                            <button class="btn btn-sm btn-icon btn-light" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-arrow ml-n1"></div><button type="button" class="dropdown-item">Copy text</button> <button type="button" class="dropdown-item">Edit</button> <button type="button" class="dropdown-item">Reply</button> <button type="button" class="dropdown-item">Remove</button>
                                            </div>
                                        </div>
                                    </li><!-- /.conversation-inbound -->
                                    <!-- .conversation-inbound -->
                                    <li class="conversation-inbound">
                                        <div class="conversation-avatar">
                                            <a href="#" class="user-avatar"><img src="assets/images/avatars/uifaces11.jpg" alt=""> <span class="avatar-badge online"></span></a>
                                        </div>
                                        <div class="conversation-message">
                                            <div class="conversation-message-text">
                                                <div class="typing mr-1">
                                                    <span class="dot"></span> <span class="dot"></span> <span class="dot"></span>
                                                </div><em>Jennifer Gray is typing</em>
                                            </div>
                                        </div>
                                    </li><!-- /.conversation-inbound -->
                                </ul><!-- /.conversation-list -->
                            </div><!-- /.conversations -->
                            <!-- PhotoSwipe (.pswp) element -->
                            <div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                <!-- .pswp__bg -->
                                <div class="pswp__bg"></div><!-- .pswp__scroll-wrap -->
                                <div class="pswp__scroll-wrap">
                                    <!-- .pswp__container -->
                                    <div class="pswp__container">
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                    </div><!-- /.pswp__container -->
                                    <!-- .pswp__ui pswp__ui--hidden -->
                                    <div class="pswp__ui pswp__ui--hidden">
                                        <!-- .pswp__top-bar -->
                                        <div class="pswp__top-bar">
                                            <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                                            <div class="pswp__preloader">
                                                <div class="pswp__preloader__icn">
                                                    <div class="pswp__preloader__cut">
                                                        <div class="pswp__preloader__donut"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.pswp__top-bar -->
                                        <!-- .pswp__share-modal -->
                                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                            <div class="pswp__share-tooltip"></div>
                                        </div><!-- /.pswp__share-modal -->
                                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                                        <div class="pswp__caption">
                                            <div class="pswp__caption__center"></div>
                                        </div>
                                    </div><!-- /.pswp__ui pswp__ui--hidden -->
                                </div><!-- /.pswp__scroll-wrap -->
                            </div><!-- /PhotoSwipe (.pswp) element -->
                        </div><!-- /.card -->
                    </div><!-- /message body -->
                    <!-- message publisher -->
                    <div class="message-publisher">
                        <!-- form -->
                        <form>
                            <!-- .media -->
                            <div class="media mb-1">
                                <div class="btn btn-light btn-icon fileinput-button">
                                    <i class="fa fa-paperclip"></i> <input type="file" id="pm-attachment" name="pmAttachment[]" multiple>
                                </div>
                                <div class="media-body">
                                    <input type="text" class="form-control border-0 shadow-none" name="messageText" placeholder="Type a message">
                                </div>
                                <div>
                                    <button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button> <button type="submit" class="btn btn-light btn-icon"><i class="far fa-paper-plane"></i></button>
                                </div>
                            </div><!-- /.media -->
                        </form><!-- /form -->
                    </div><!-- /message publisher -->
                </div><!-- /.message -->
            </div><!-- /.page-sidebar -->
            <!-- Keep in mind that modals should be placed outsite of page sidebar -->
            <!-- .modal -->
            <form id="clientNewForm" name="clientNewForm">
                <div class="modal fade" id="clientNewModal" tabindex="-1" role="dialog" aria-labelledby="clientNewModalLabel" aria-hidden="true">
                    <!-- .modal-dialog -->
                    <div class="modal-dialog" role="document">
                        <!-- .modal-content -->
                        <div class="modal-content">
                            <!-- .modal-header -->
                            <div class="modal-header">
                                <h6 id="clientNewModalLabel" class="modal-title inline-editable">
                                    <span class="sr-only">Client name</span> <input type="text" class="form-control form-control-lg" placeholder="E.g. Stilearning, Inc." required="">
                                </h6>
                            </div><!-- /.modal-header -->
                            <!-- .modal-body -->
                            <div class="modal-body">
                                <!-- .form-row -->
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cnContactName">Contact name</label> <input type="text" id="cnContactName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cnContactEmail">Contact email</label> <input type="email" id="cnContactEmail" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cnStreet">Street</label> <input type="text" id="cnStreet" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cnSuite">Suite</label> <input type="text" id="cnSuite" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cnZip">Zip</label> <input type="text" id="cnZip" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cnCountry">Country</label> <select id="cnCountry" class="custom-select d-block w-100">
                                                <option value=""> Choose... </option>
                                                <option> United States </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cnCity">City</label> <select id="cnCity" class="custom-select d-block w-100">
                                                <option value=""> Choose... </option>
                                                <option> San Francisco </option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- /.form-row -->
                            </div><!-- /.modal-body -->
                            <!-- .modal-footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button> <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div><!-- /.modal-footer -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </form><!-- /.modal -->
        </div><!-- /.page -->
    </div><!-- /.wrapper -->
</main><!-- /.app-main -->