<div class="modal fade" id="modalLogin" tabindex="-1" delay="10000" role="dialog" aria-labelledby="exampleModalLabelMd"
     aria-hidden="true">
    <div class="modal-dialog bg-dark" role="document">
        <div class="modal-dialog bg-dark" role="document">
            <div class="bg-dark modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabelMd">Зарегистрируйтесь или войдите в аккаунт, чтобы сохранять
                        результаты</h5>

                </div>
                <div class="modal-body p-0 m-5 m-4-xs">
                    <div id="ajax_response_container"><!-- ajax response container --></div>
                    <div class="accordion" id="accordionAccount">

                        <!-- sign in -->
                        <form class="bs-validate js-ajax collapse show" novalidate="" method="post"
                              action="{{route('login')}}" id="accordionAccountSignIn" data-bs-parent="#accordionAccount"
                              data-ajax-container="#ajax_response_container"
                              data-ajax-update-url="false"
                              data-ajax-show-loading-icon="true"

                              data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i> Please, complete all required fields!"
                              data-error-toast-delay="3000"
                              data-error-toast-position="top-center"

                              data-error-scroll-up="true"
                              data-ajax-callback-function="modalClose">
                            @csrf
                            <!-- email -->
                            <div class="form-floating mb-3">

                                <input required="" placeholder="Логин" id="signin_email" name="login" type="text"
                                       class="form-control">
                                <label for="signin_email">Логин</label>

                            </div>


                            <!-- password -->
                            <div class="input-group-over mb-3">

                                <div class="form-floating">
                                    <input required="" placeholder="Password" id="signin_password" name="password"
                                           type="password" class="form-control" autocomplete="new-password">
                                    <label for="signin_password">Пароль</label>
                                </div>

                            </div>


                            <!-- button -->
                            <button type="submit" class="btn btn-outline-warning transition-all-ease-500 w-100">
                                Войти
                            </button>

                            <div class="mt-4 text-center">
                                <a href="#accordionAccountSignUp" class="d-block link-secondary"
                                   data-bs-toggle="collapse" aria-expanded="true"
                                   aria-controls="accordionAccountSignUp">
                                    Еще не зарегистрированы?
                                </a>
                            </div>

                        </form>
                        <!-- /sign in -->

                        <!-- sign up -->
                        <form class="collapse bs-validate js-ajax" novalidate="" method="post" action="{{route('register_quiz')}}"
                              id="accordionAccountSignUp" data-bs-parent="#accordionAccount"
                              data-ajax-container="#ajax_response_container"
                              data-ajax-update-url="false"
                              data-ajax-show-loading-icon="true"

                              data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i> Please, complete all required fields!"
                              data-error-toast-delay="3000"
                              data-error-toast-position="top-center"

                              data-error-scroll-up="true"
                              data-ajax-callback-function="modalClose">
                            @csrf
                            <div class="form-floating mb-3">
                                <input required="" id="signup_first_name" type="text" name="name" class="form-control"
                                       placeholder="First Name">
                                <label for="signup_first_name">Имя</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input required="" id="signup_last_name" type="text" name="login" class="form-control"
                                       placeholder="Last Name">
                                <label for="signup_last_name">Логин</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input required="" id="signup_email" type="email" name="email" class="form-control"
                                       placeholder="Email">
                                <label for="signup_email">Email</label>
                            </div>

                            <div class="input-group-over mb-3">

                                <div class="form-floating">
                                    <input required="" placeholder="Password" id="account_password" name="password"
                                           type="password" class="form-control">
                                    <label for="account_password">Пароль</label>
                                </div>


                            </div>


                            <button type="submit" class="btn btn-outline-warning transition-all-ease-500 w-100">
                                Зарегистрироваться
                            </button>

                            <div class="text-center mt-4">
                                <a href="#accordionAccountSignIn" class="d-block link-secondary"
                                   data-bs-toggle="collapse" aria-expanded="true"
                                   aria-controls="accordionAccountSignIn">
                                    Назад к авторизации
                                </a>
                            </div>

                        </form>
                        <!-- /sign up -->

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                        <i class="fi fi-close"></i>
                        Играть без регистрации
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
