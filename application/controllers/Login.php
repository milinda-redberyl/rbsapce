<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller

{

    Private $main;



    function __construct()

    {

        parent::__construct();

        $this->load->model('Login_model');



    }



    public function index($employee_code = NULL, $message = NULL, $type = 'e', $loginpage = 0)

    {

        $Session_data = null;

        $this->load->model('session_model');

        $uData = $this->session->userdata();

        /*print_r($uData);

        exit;*/



        if ($employee_code) {

            if (md5($this->session->userdata('empID')) == $employee_code) {

                $this->redirect();

            } else {

                $Session_data = $this->session_model->createSession($employee_code);



                if ($Session_data['stats']) {

                    $this->session->set_flashdata('s', $this->session->userdata('username') . ' Successfully logged into System123');

                    $this->redirect();

                } else {

                    $this->no_permission();

                }

            }

        } else {

            $empID = $this->session->userdata('empID');

            if (isset($empID) && !empty($empID)) {

                $this->redirect();

            } else {

                $data['title'] = 'Login';

                $data['extra'] = $message;

                $data['type'] = $type;

                if ($loginpage == 1) {

                    redirect();

                } else {

                    $this->load->view('login_page', $data);

                }

            }

        }

    }



    function redirect()

    {

        $isSystemAdmin = $this->session->userdata('isSystemAdmin');

        $isCompany = $this->session->userdata('isCompany');

        if ($isSystemAdmin == 1) {

            redirect('dashboard');

        } else if ($isCompany == 1) {

            redirect('company_users');

        } else {

            redirect('');

        }

    }





    function forget_password()

    {

        $data['title'] = 'Forget Password';

        $data['extra'] = NULL;

        $data['type'] = 'e';

        $this->load->view('forget_password', $data);

    }



    public function login_pin($id)

    {

        $Session_data = null;

        $this->load->model('session_model');

        if ($this->session->userdata('e_empID')) {

            redirect('dashboard');

        } else {

            $this->no_permission_pin($id);

        }



    }



    function no_permission()

    {

        $this->session->sess_destroy();

        //header('Location:/../../srp');

        $data['title'] = 'Login';

        $data['extra'] = NULL;

        $data['type'] = 'e';

        $this->load->view('login_page', $data);

    }



    function no_permission_pin($id)

    {

        $this->session->sess_destroy();

        //header('Location:/../../srp');

        $data['title'] = 'Login';

        $data['extra'] = NULL;

        $data['adminMasterID'] = $id;

        $this->load->view('login_pin_page', $data);

    }



    function no_permission_forgot_password()

    {

        $this->session->sess_destroy();

        //header('Location:/../../srp');

        $data['title'] = 'Reset Password';

        $data['extra'] = NULL;

        $this->load->view('reset_password', $data);

    }



    function session_expaide()

    {

        echo "session_expaide";

    }



    public function logout()

    {

        $isSystemAdmin = $this->session->userdata('isSystemAdmin');

        $this->session->sess_destroy();

        $data['title'] = 'Login';

        $data['extra'] = NULL;

        if ($isSystemAdmin == 1) {

            $this->load->view('login_page', $data);

        } else {

            redirect('');

        }



    }



    function session_status()

    {

        $output = ($this->session->userdata("empID")) ? 1 : 0;

        echo json_encode(array('status' => $output));

    }



    function company_configuration()

    {

        $data['title'] = 'Welcome Dashboard';

        $data['main_content'] = 'system/configuration/company_configuration';

        $data['extra'] = NULL;

        $this->load->view('include/template', $data);

    }



    function loginSubmit()

    {

        $this->load->model('session_model');

        $this->form_validation->set_rules('Username', 'Username', 'trim|required');

        $this->form_validation->set_rules('Password', 'Password', 'trim|required');



        $loginpage = $this->input->post('loginpage');



        if ($this->form_validation->run() == FALSE) {



            $this->index(FALSE, $result['message'] = validation_errors(), $result['type'] = 'e', $loginpage);

        } else {



            $login_data['userN'] = $this->input->post('Username');

            $login_data['passW'] = md5($this->input->post('Password'));

            $this->db->select('*');

            $this->db->from('srp_employeesdetails');

            $this->db->where("UserName", $login_data['userN']);

            $this->db->where("Password", $login_data['passW']);

            $result_tmp = $this->db->get()->row_array();

            if ($result_tmp) {

                $result = $this->session_model->authenticateLogin($login_data);



                if ($result['status'] == "s") {

                    $this->redirect(base_url());

                }



                /*if ($result['status']) {

                   // $this->index($result['data'], NULL);

                } else {

                    $this->index(FALSE, $result['message']);

                }*/

            } else {

                $data['title'] = 'Login';

                $data['type'] = 'e';

                $data['extra'] = 'Invalid username or password. Please  try again.';

                $this->load->view('login_page', $data);

            }

        }

    }





    function loginSubmit_ajax()

    {

        $this->load->model('session_model');

        $this->form_validation->set_rules('Username', 'Username', 'trim|required');

        $this->form_validation->set_rules('Password', 'Password', 'trim|required');



        $loginpage = $this->input->post('loginpage');



        if ($this->form_validation->run() == FALSE) {



            $this->index(FALSE, $result['message'] = validation_errors(), $result['type'] = 'e', $loginpage);

        } else {



            $login_data['userN'] = $this->input->post('Username');

            $login_data['passW'] = md5($this->input->post('Password'));

            $this->db->select('*');

            $this->db->from('srp_employeesdetails');

            $this->db->where("UserName", $login_data['userN']);

            //$this->db->where("Password", $login_data['passW']);

            $result_tmp = $this->db->get()->row_array();

            if ($result_tmp) {

                $result = $this->session_model->authenticateLogin($login_data);

                echo json_encode($result);

            } else {

                echo json_encode(array('status' => 'e', 'message' => '<i class="fa fa-warning"></i> The username or email address is not registered with ' . sys_name() . '.'));

            }

        }

    }



    function signupSubmit_ajax()

    {

        $this->load->model('session_model');

        $this->form_validation->set_rules('Username', 'Username', 'trim|required');

        $this->form_validation->set_rules('Password', 'Password', 'trim|required');

        $this->form_validation->set_rules('EEmail', 'EEmail', 'trim|required');



        $loginpage = $this->input->post('loginpage');



        if ($this->form_validation->run() == FALSE) {

            echo json_encode(array('e', validation_errors()));

        } else {

            $email = $this->input->post('EEmail');

            print_r($email);

            $user = $this->Login_model->get_users($email);

            if (empty($user)) {

                $result = $this->Login_model->save_space_host();



                if ($result) {

                    // $this->Login_model->send_thankyou_Email();

                    echo json_encode(array('s', 'You are successfully registered, Our team will review and contact you. Thanks.'));

                } else {

                    echo json_encode(array('e', 'An error has occurred!'));



                }

            } else {

                echo json_encode(array('e', 'This email address is already registered with our system.'));

            }

        }

    }



    function forgetPasswordSubmit()

    {

        $this->form_validation->set_rules('email', 'email', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Login';

            $data['extra'] = validation_errors();

            $this->load->view('forget_password', $data);

        } else {

            $this->db->select('*');

            $this->db->where("email", $this->input->post('email'));

            $result = $this->db->get("user")->row_array();

            if ($result) {

                $PIN = rand(10000, 99999);

                $encryptValue = trim(sha1($PIN));

                $param['randNum'] = trim($encryptValue);

                $param['id'] = trim($result["empID"]);

                $param['autoID'] = trim($result["EidNo"]);

                $update = $this->db->where("email", $this->input->post('email'))->update('user', array('randNum' => trim($encryptValue)));

                if ($update) {

                    $config['charset'] = "utf-8";

                    $config['mailtype'] = "html";

                    $config['wordwrap'] = TRUE;

                    $config['protocol'] = 'smtp';

                    $config['smtp_host'] = 'smtp.sendgrid.net';

                    $config['smtp_user'] = 'azure_61fdfd424467a8cecb84bf014f8b5e26@azure.com';

                    $config['smtp_pass'] = 'P@ssw0rd240!';

                    $config['smtp_crypto'] = 'tls';

                    $config['smtp_port'] = '587';

                    $condig['crlf'] = "\r\n";

                    $config['newline'] = "\r\n";



                    $this->load->library('email', $config);

                    $this->email->from('noreply@spur-int.com', SYS_NAME);

                    if (!empty($param)) {

                        $this->email->to($this->input->post('email'));

                        $this->email->subject('Forgot Password');

                        $this->email->message($this->load->view('system/email_template/email_template', $param, TRUE));

                    }

                    $result = $this->email->send();

                    if ($result) {

                        $data['title'] = 'Login';

                        $data['extra'] = 'An email has been sent to your mail inbox, Use the password reset link in the mail to reset your password';

                        $data['type'] = 's';

                        $this->load->view('forget_password', $data);

                    } else {

                        $data['title'] = 'Login';

                        $data['type'] = 'e';

                        $data['extra'] = 'Error occurred in email sending - ' . $this->email->print_debugger();

                        $this->load->view('forget_password', $data);

                    }

                } else {

                    $data['title'] = 'Login';

                    $data['type'] = 'e';

                    $data['extra'] = 'Error occurred';

                    $this->load->view('forget_password', $data);

                }

            } else {

                $data['title'] = 'Login';

                $data['extra'] = 'Your email is not registered with the system';

                $data['type'] = 'e';

                $this->load->view('forget_password', $data);

            }

        }

    }



    function loginPinSubmit()

    {



        $this->encryption->initialize(array('driver' => 'mcrypt'));

        $this->load->model('session_model');

        $this->form_validation->set_rules('pinNumber', 'Pin Number', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('msg', validation_errors());

            redirect('pin_login/' . $this->input->post('adminMasterID'));

        } else {



            $this->db->select('*');

            $this->db->where("adminMasterID", $this->input->post('adminMasterID'));

            $this->db->where("pinNumber", $this->input->post('pinNumber'));

            $pinRec = $this->db->get("srp_erp_companyadminmaster")->row_array();

            if ($pinRec) {

                $this->db->select('*');

                $this->db->where("isSystemAdmin", 1);

                $this->db->where("user.companyID", $pinRec["companyID"]);

                $this->db->join('srp_erp_company', ' user.companyID = srp_erp_company.company_id', 'inner');

                $resultDb2 = $this->db->get("user")->row_array();

                $result = "";

                if ($resultDb2) {

                    $login_data['userN'] = $resultDb2['Username'];

                    $login_data['passW'] = $resultDb2['Password'];

                    $config['hostname'] = trim($this->encryption->decrypt($resultDb2["host"]));

                    $config['username'] = trim($this->encryption->decrypt($resultDb2["db_username"]));

                    $config['password'] = trim($this->encryption->decrypt($resultDb2["db_password"]));

                    $config['database'] = trim($this->encryption->decrypt($resultDb2["db_name"]));

                    $config['dbdriver'] = 'mysqli';

                    $config['db_debug'] = FALSE;

                    $config['char_set'] = 'utf8';

                    $config['dbcollat'] = 'utf8_general_ci';

                    $config['cachedir'] = '';

                    $config['swap_pre'] = '';

                    $config['encrypt'] = FALSE;

                    $config['compress'] = FALSE;

                    $config['stricton'] = FALSE;

                    $config['failover'] = array();

                    $config['save_queries'] = TRUE;

                    $this->load->database($config, FALSE, TRUE);

                    $result = $this->session_model->authenticateLogin($login_data);

                }

                if ($result['stats']) {

                    $this->main = $this->load->database('db2', TRUE);

                    $this->main->set('pinNumber', null);

                    $this->main->where("adminMasterID", $this->input->post('adminMasterID'));

                    $this->main->update("srp_erp_companyadminmaster");

                    $this->index($result['data'], NULL);

                } else {

                    $this->session->set_flashdata('msg', 'Error Occurred');

                    redirect('pin_login/' . $this->input->post('adminMasterID'));

                }

            } else {

                $this->session->set_flashdata('msg', 'Invalid PIN Number');

                redirect('pin_login/' . $this->input->post('adminMasterID'));

            }

        }

    }



    function reset_password($randNum, $empID, $autoID)

    {

        $password = $this->input->post('Password');

        if (isset($password)) {

            $this->form_validation->set_rules('Password', 'Password', 'trim|required');

            $this->form_validation->set_rules('ConfirmPassword', 'Confirm Password', 'trim|required|matches[Password]');

            if ($this->form_validation->run() == FALSE) {

                $data['title'] = 'Login';

                $data['extra'] = validation_errors();

                $this->load->view('reset_password', $data);

            } else {

                $this->db->select('*');

                $this->db->where("randNum", $randNum);

                $this->db->where("empID", $empID);

                $this->db->where("EidNo", $autoID);

                $this->db->join('srp_erp_company', ' user.companyID = srp_erp_company.company_id', 'inner');

                $result = $this->db->get("user")->row_array();

                if ($result) {

                    $update = $this->db->where("EidNo", $autoID)->update('user', array('randNum' => null, 'Password' => md5($this->input->post('Password'))));

                    if ($update) {

                        $login_data['userN'] = $result['Username'];

                        $login_data['passW'] = $result['Password'];

                        $config['hostname'] = trim($this->encryption->decrypt($result["host"]));

                        $config['username'] = trim($this->encryption->decrypt($result["db_username"]));

                        $config['password'] = trim($this->encryption->decrypt($result["db_password"]));

                        $config['database'] = trim($this->encryption->decrypt($result["db_name"]));

                        $config['dbdriver'] = 'mysqli';

                        $config['db_debug'] = FALSE;

                        $config['char_set'] = 'utf8';

                        $config['dbcollat'] = 'utf8_general_ci';

                        $config['cachedir'] = '';

                        $config['swap_pre'] = '';

                        $config['encrypt'] = FALSE;

                        $config['compress'] = FALSE;

                        $config['stricton'] = FALSE;

                        $config['failover'] = array();

                        $config['save_queries'] = TRUE;

                        $this->load->database($config, FALSE, TRUE);

                        $updateEmp = $this->db->where("EidNo", $empID)->update('srp_employeesdetails', array('Password' => md5($this->input->post('Password'))));

                        if ($updateEmp) {

                            $this->session->set_flashdata('msg', 'Successfully Password Changed');

                            redirect('LoginPage');

                        } else {

                            $data['title'] = 'Login';

                            $data['extra'] = 'Error Occurred';

                            $data['type'] = 'e';

                            $this->load->view('reset_password', $data);

                        }

                    }

                } else {

                    $data['title'] = 'Login';

                    $data['extra'] = 'Invalid Tocken';

                    $data['type'] = 'e';

                    $this->load->view('reset_password', $data);

                }

            }

        } else {

            $Session_data = null;

            $this->load->model('session_model');

            if ($this->session->userdata('e_empID')) {

                redirect('dashboard');

            } else {

                $this->no_permission_forgot_password();

            }

        }

    }



    public

    function under_construction()

    {

        $this->session->sess_destroy();

        $data['title'] = 'Login';

        $data['extra'] = NULL;

        $this->load->view('site_under_construction', $data);



    }



    function loginRegister()

    {

        $this->form_validation->set_rules('firstName', 'First Name', 'trim|required');

        $this->form_validation->set_rules('companyName', 'Company Name', 'trim');

        $this->form_validation->set_rules('registrationNumber', 'Registration Number', 'trim');

        $this->form_validation->set_rules('partnerAddress', 'Partner Address', 'trim');

        $this->form_validation->set_rules('EEmail', 'Email', 'trim|required');

        $this->form_validation->set_rules('Password', 'Password', 'trim|required|callback_validate_password');

        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[Password]');

        $this->form_validation->set_rules('EpTelephone', 'Telephone', 'trim|required');

        // $this->form_validation->set_rules('EpMobile', 'Mobile', 'trim|required');

        $this->form_validation->set_rules('city_id', 'City', 'trim|required');

        $this->form_validation->set_rules('category_list', 'Service Type', 'trim');

        $this->form_validation->set_rules('property_list', 'Property Type', 'trim');





        if ($this->form_validation->run() == FALSE) {

            echo json_encode(array('e', validation_errors()));

        } else {

            $email = $this->input->post('EEmail');

            $user = $this->Login_model->get_users($email);

            if (empty($user)) {

                $result = $this->Login_model->save_partner();

                if ($result) {

<<<<<<< HEAD
                     $this->Login_model->send_thankyou_Email();
=======
                    $this->Login_model->send_thankyou_Email();
>>>>>>> dev

                    echo json_encode(array('s', 'You are successfully registered, Our team will review and contact you. Thanks.'));

                } else {

                    echo json_encode(array('e', 'An error has occurred!'));



                }

            } else {

                echo json_encode(array('e', 'This email address is already registered with our system.'));

            }

        }

    }



    public function validate_password($password)

    {

        $passwordErr = "";



        if (strlen($password) <= '8') {

            $passwordErr = "Your Password Must Contain At Least 8 Characters!";

        } elseif (!preg_match("#[0-9]+#", $password)) {

            $passwordErr = "Your Password Must Contain At Least 1 Number!";

        } elseif (!preg_match("#[A-Z]+#", $password)) {

            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";

        } elseif (!preg_match("#[a-z]+#", $password)) {

            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";

        } elseif (!preg_match('/[`~!@#$%^&\*()\ \_\+\-=\{\}\|\\\:";\'<>\?,\.]/', $password)) {

            $passwordErr = "Your Password Must Contain At Least 1 Special Character!";

        }



        if ($passwordErr != "") {

            $this->form_validation->set_message('validate_password', $passwordErr);

            return FALSE;

        } else {

            return TRUE;

        }

    }





}

