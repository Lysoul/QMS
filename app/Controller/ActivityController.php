<?php 
session_start();
class ActivityController extends AppController{

	public function role_edit(){
		App::uses('Security', 'Utility');
	    $key = 'JKcPpZgbwUaJcfGZK1gcsCYSwr1eTzjk';
	    $id = ($_GET['id'] == NULL || $_GET['id'] == '') ? '' : Security::decrypt($_GET['id'] , $key);

		if($id != '') {
			$this->loadModel('Role');

			$query = $this->Role->find('all', array('conditions' => array('Role.id' => $id)));

			$this->set('editrole', $query);



			if($this->request->is('post')){
				$rolename = $this->data['rolename'];
				$rolesname = $this->data['rolesname'];
				$introdes = $this->data['introdes'];
				$maindes = $this->data['maindes'];

				$data = array('id' => $id, 'name' => $rolename, 'short_name' => $rolesname, 'intro_description' => $introdes, 'main_description' => $maindes);
				$this->Role->save($data);
				$this->redirect(array("controller" => "activity", 
	      			"action" => "content_management",
	            ));



			}


		}



	}

	public function role_manage(){
		$this->loadModel('Role');
		$query = $this->Role->find('all',array('order' => array('name' => 'asc')));


		$this->set('pullrole', $query);


	}

	public function sub_edit(){
		App::uses('Security', 'Utility');
	    $key = 'JKcPpZgbwUaJcfGZK1gcsCYSwr1eTzpb';
	    $id = ($_GET['id'] == NULL || $_GET['id'] == '') ? '' : Security::decrypt($_GET['id'] , $key);

		if($id != '') {
			$this->loadModel('Subprocess');

			$query = $this->Subprocess->find('all', array('conditions' => array('Subprocess.id' => $id),'fields' => array('name','short_name','intro_description','main_description','process_insub')));

			$this->set('editsub', $query);



			if($this->request->is('post')){
				$subname = $this->data['subname'];
				$subsname = $this->data['subsname'];
				$subnumber = $this->data['subnumber'];
				$introdes = $this->data['introdes'];
				$maindes = $this->data['maindes'];


				
				
				$data = array('id' => $id, 'name' => $subname,'short_name' => $subsname,'intro_description' => $introdes,'main_description' => $maindes,'process_insub' => $subnumber);

				if($this->Subprocess->save($data)) {
					$this->redirect(array("controller" => "activity", 
                  			"action" => "content_management",
		                ));
				}


				// $updateQuery = "UPDATE subprocesses SET name='".$subname."', short_name='".$subsname."', intro_description='".$introdes."', main_description='".$maindes."', process_insub='".$subnumber."' WHERE id='".$id."' ";
				// $this->Subprocess->query($updateQuery);
				// $this->redirect(array("controller" => "activity", 
	   //    			"action" => "content_management",
	   //          ));



			}


		}


	}

	public function subprocess_manage(){
		$this->loadModel('Subprocess');
		$query1 = $this->Subprocess->find('all', array('conditions' => array('process_id' => 1)));
		$query2 = $this->Subprocess->find('all', array('conditions' => array('process_id' => 2)));


		$this->set('pullsubpm', $query1);
		$this->set('pullsubsi', $query2);
	}


	public function si_manage() {
		$this->loadModel('Process');

		$query = $this->Process->find('all', array('conditions' => array('id' => 2)));

		$this->set('pullsi', $query);

		 if($this->request->is('post')){


				$headname = $this->data['header'];
				$sname = $this->data['shortname'];
				$des = $this->data['description'];
				$imghead1 = $this->data['imgheadername1'];
				$imghead2 = $this->data['imgheadername2'];
				$imghead3 = $this->data['imgheadername3'];
				$imghead4 = $this->data['imgheadername4'];
				$imgdes1 = $this->data['imgdes1'];
				$imgdes2 = $this->data['imgdes2'];
				$imgdes3 = $this->data['imgdes3'];
				$imgdes4 = $this->data['imgdes4'];

				$data = array('id' => 2, 'name' => $headname,'short_name' => $sname,'description' => $des,'img_head1' => $imghead1,'img_head2' => $imghead2,'img_head3' => $imghead3,'img_head4' => $imghead4, 'img_des1' => $imgdes1,'img_des2' => $imgdes2,'img_des3' => $imgdes3,'img_des4' => $imgdes4);


         		if(!empty($this->data['simanage']['imgfile1']['name'])){
                    $file = $this->data['simanage']['imgfile1']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploads/'.$file['name']);

                        //prepare the filename for database entry
                        $imgname1 = $file['name'];

                        $data['img_name1'] = $imgname1;
                    }

                }


         		if(!empty($this->data['simanage']['imgfile2']['name'])){
                    $file = $this->data['simanage']['imgfile2']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploads/' . $file['name']);

                        //prepare the filename for database entry
                        $imgname2 = $file['name'];

                        $data['img_name2'] = $imgname2;
                    }

                }



         		if(!empty($this->data['simanage']['imgfile3']['name'])){
                    $file = $this->data['simanage']['imgfile3']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploads/' . $file['name']);

                        //prepare the filename for database entry
                        $imgname3 = $file['name'];

                        $data['img_name3'] = $imgname3;
                    }

                }


         		if(!empty($this->data['simanage']['imgfile4']['name'])){
                    $file = $this->data['simanage']['imgfile4']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploads/' . $file['name']);

                        //prepare the filename for database entry
                        $imgname4 = $file['name'];

                        $data['img_name4'] = $imgname4;
                    }

                }







				if($this->Process->save($data)) {
					$this->redirect(array("controller" => "activity", 
                  			"action" => "content_management",
		                ));
				}




		 }



	}



	public function pm_manage() {
		$this->loadModel('Process');

		$query = $this->Process->find('all', array('conditions' => array('id' => 1)));

		$this->set('pullpm', $query);

		 if($this->request->is('post')){


				$headname = $this->data['header'];
				$sname = $this->data['shortname'];
				$des = $this->data['description'];
				$imghead1 = $this->data['imgheadername1'];
				$imghead2 = $this->data['imgheadername2'];
				$imghead3 = $this->data['imgheadername3'];
				$imghead4 = $this->data['imgheadername4'];
				$imgdes1 = $this->data['imgdes1'];
				$imgdes2 = $this->data['imgdes2'];
				$imgdes3 = $this->data['imgdes3'];
				$imgdes4 = $this->data['imgdes4'];

				$data = array('id' => 1, 'name' => $headname,'short_name' => $sname,'description' => $des,'img_head1' => $imghead1,'img_head2' => $imghead2,'img_head3' => $imghead3,'img_head4' => $imghead4, 'img_des1' => $imgdes1,'img_des2' => $imgdes2,'img_des3' => $imgdes3,'img_des4' => $imgdes4);


         		if(!empty($this->data['pmmanage']['imgfile1']['name'])){
                    $file = $this->data['pmmanage']['imgfile1']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploads/'.$file['name']);

                        //prepare the filename for database entry
                        $imgname1 = $file['name'];

                        $data['img_name1'] = $imgname1;
                    }

                }


         		if(!empty($this->data['pmmanage']['imgfile2']['name'])){
                    $file = $this->data['pmmanage']['imgfile2']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploads/' . $file['name']);

                        //prepare the filename for database entry
                        $imgname2 = $file['name'];

                        $data['img_name2'] = $imgname2;
                    }

                }



         		if(!empty($this->data['pmmanage']['imgfile3']['name'])){
                    $file = $this->data['pmmanage']['imgfile3']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploads/' . $file['name']);

                        //prepare the filename for database entry
                        $imgname3 = $file['name'];

                        $data['img_name3'] = $imgname3;
                    }

                }


         		if(!empty($this->data['pmmanage']['imgfile4']['name'])){
                    $file = $this->data['pmmanage']['imgfile4']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploads/' . $file['name']);

                        //prepare the filename for database entry
                        $imgname4 = $file['name'];

                        $data['img_name4'] = $imgname4;
                    }

                }







				if($this->Process->save($data)) {
					$this->redirect(array("controller" => "activity", 
                  			"action" => "content_management",
		                ));
				}




		 }



	}


	public function roleovv(){
		$this->loadModel('Roleoverview');

		$query = $this->Roleoverview->find('all', array('conditions' => array('id' => 1)));

		$this->set('pullroleovv', $query);

		 if($this->request->is('post')){


				$headname = $this->data['header'];
				$des = $this->data['description'];

				$data = array('id' => 1, 'header' => $headname, 'description' => $des);

				if($this->Roleoverview->save($data)) {
					$this->redirect(array("controller" => "activity", 
                  			"action" => "content_management",
		                ));
				}




		 }


	}

	public function processovv(){
		$this->loadModel('Processoverview');

		$query = $this->Processoverview->find('all', array('conditions' => array('id' => 1)));

		$this->set('pullprocessovv', $query);

		 if($this->request->is('post')){


				$headname = $this->data['header'];
				$des = $this->data['description'];

				$data = array('id' => 1, 'header' => $headname, 'description' => $des);

				if($this->Processoverview->save($data)) {
					$this->redirect(array("controller" => "activity", 
                  			"action" => "content_management",
		                ));
				}




		 }



	}

	public function manageabout(){

		$this->loadModel('About');

		$aboutquery = "SELECT header_name,subheader_name1,subheader_description1,subheader_name2,subheader_description2 FROM abouts   ";

        $pullabout = $this->About->query($aboutquery);

        $this->set('pullabout', $pullabout);




        if($this->request->is('post')){

				$headname = $this->data['header_name'];
				$subheadname1 = $this->data['subhead1_name'];
				$subheaddes1 = $this->data['subhead1_des'];
				$subheadname2 = $this->data['subhead2_name'];
				$subheaddes2 = $this->data['subhead2_des'];

				$data = array('id' => 1, 'header_name' => $headname, 'subheader_name1' => $subheadname1, 'subheader_description1' => $subheaddes1, 'subheader_name2' => $subheadname2, 'subheader_description2' => $subheaddes2);

				if($this->About->save($data)) {
					$this->redirect(array("controller" => "activity", 
                  			"action" => "content_management",
		                ));
				}

        }


	}



	public function index(){




	}


	public function login(){
		$_SESSION["page"] = 0;


		$this->loadModel('User');

		if($this->request->is('post')){
			

			//$myquery = "SELECT username, password, role FROM users WHERE username = '".$this->request->data['Login']['username']."' AND username = '".$this->request->data['Login']['password']."' ";
			
			$query = $this->User->find('all',array('conditions' => array('username' => $this->request->data['Login']['username'],'password' => $this->request->data['Login']['password'])));


			if($query){
					
					foreach ($query as $myvalue) {
						$_SESSION["userid"] = $myvalue['User']['id'];
						$_SESSION["username"] = $myvalue['User']['username'];
						//$this->Session->write('userid', $myvalue['User']['id']);
						//$this->Session->write('username', $myvalue['User']['username']);
					}


					$this->redirect(array("controller" => "Activity", 
	                      "action" => "index",
	                    )
	             
	              	);

			}else{


			}
	       

		}




	}

	public function logout(){
		unset($_SESSION["userid"]);
		unset($_SESSION["username"]);
		//$this->Session->delete('userid');
		//$this->Session->delete('username');
		$this->redirect(array("controller" => "Main", 
              "action" => "index",
            )
     
      	);


	}



	public function add(){
		$this->loadModel('Activity');
		$this->loadModel('Process');
		$this->loadModel('Role');

		$processes = $this->Process->find('all');
		$roles = $this->Role->find('all',array(
        'order' => array('name' => 'asc')));

		$this->set('processes', $processes);
		$this->set('roles', $roles);


		if($this->request->is('post')){

			$activityName = $this->data['activity_name'];
			$role1 = $this->data['role1_name'];
			$role2 = $this->data['Add']['role2_name'];
			$role3 = $this->data['Add']['role3_name'];
			$role4 = $this->data['Add']['role4_name'];
			$role5 = $this->data['Add']['role5_name'];
			$templateName = $this->data['Add']['template_name'];
			$templateType = $this->data['Add']['template_type'];
			$subsequence = $this->data['activity_sequence'];
			$subprocessName = $this->data['subprocess_name'];
			$ip = gethostbyname(gethostname());



			if($templateType == "1"){
				$templateUrl = $this->data['Add']['template_url'];
				$insertQuery = "INSERT INTO activities (name, role_name1, role_name2, role_name3, role_name4, role_name5, template_name, template_url,template_check,sub_sort, created_by, created_date, subprocess_id) VALUES ('".$activityName."', '".$role1."', '".$role2."' , '".$role3."' , '".$role4."' , '".$role5."' , '".$templateName."' , '".$templateUrl."' , '".$templateType."' , '".$subsequence."' , '".$ip."', '".date("Y-m-d H:i:s")."' , ".$subprocessName.")";
				
			}else{

         		if(!empty($this->data['Add']['template_file']['name'])){
                    $file = $this->data['Add']['template_file']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('docx', 'docm', 'doc','dotx','dotm','dot','pdf','xps','rtf','txt','xml','odt','wps','xls','xlsm','xlsb','xlsx','xltx','xltm','xlt','csv','pptx','pptm','ppt','potx','potm','pot','ppsx','ppsm','pps','ppam','ppa');

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploadfile/'.$file['name']);

                        //prepare the filename for database entry
                        $templatefile = $file['name'];

                        //$data['img_name1'] = $imgname1;
                        $insertQuery = "INSERT INTO activities (name, role_name1, role_name2, role_name3, role_name4, role_name5, template_name, template_file,template_check, created_by, created_date, subprocess_id) VALUES ('".$activityName."', '".$role1."', '".$role2."' , '".$role3."' , '".$role4."' , '".$role5."' , '".$templateName."' , '".$templatefile."' , '".$templateType."' , '".$ip."', '".date("Y-m-d H:i:s")."' , ".$subprocessName.")";

                    }

                }


			}
	
			
				$this->Activity->query($insertQuery);
				$this->redirect(array("controller" => "activity", 
	      			"action" => "activity_management",
	            ));

		
			

		}

	}

	public function ajax_reflection(){
		$this->layout = false;
		$this->loadModel('Subprocess');
		$subprocesses = $this->Subprocess->find('all', array(
                                         'fields' => array('Subprocess.id','Subprocess.name'), // assume the answer contains in answer field in db
                                         'conditions' => array('Subprocess.process_id' => $_POST['id'])
        ));
		$this->set('subprocesses', $subprocesses);

	}


	public function edit(){
		App::uses('Security', 'Utility');
	    $key = 'JKcPpZgbwUaJcfGZK1gcsCYSwr1eTzsf';
	    $id = ($_GET['id'] == NULL || $_GET['id'] == '') ? '' : Security::decrypt($_GET['id'] , $key);


		if($id != '') {
			$this->loadModel('Activity');
			$this->loadModel('Process');
			$this->loadModel('Subprocess');
			$this->loadModel('Role');

			$myquery = "SELECT
			activities.sub_sort,
			activities.template_check,
			activities.template_file, 
			activities.template_url,
			activities.template_name,
			activities.id,
			activities.name,
			activities.role_name1,
			activities.role_name2,
			activities.role_name3,
			activities.role_name4,
			activities.role_name5,
			activities.subprocess_id,
			subprocesses.name,
			subprocesses.intro_description,
			subprocesses.main_description,
			subprocesses.process_id,
			processes.id,
			processes.name
			FROM activities,subprocesses,processes 
			WHERE activities.subprocess_id = subprocesses.id 
			AND subprocesses.process_id = processes.id
			AND activities.id = ".$id." ";

			$activities = $this->Activity->query($myquery); //query => $myquery

			foreach ($activities as $activity) {
				$process_id = $activity['processes']['id']; //Process ID of this edit activity
			}



			$processes_all = $this->Process->find('all');
			$processes_edit = $this->Process->find('all',
				array(
					'conditions'=>array('Process.id =' => $id)
					)
				);


			$subprocess_all = $this->Subprocess->find('all',
				array(
					'conditions'=>array('Subprocess.process_id =' => $process_id)
					)
				);


			$roles = $this->Role->find('all',array(
        'order' => array('name' => 'asc')));





			$this->set('activities', $activities);
			$this->set('processes', $processes_all);
			$this->set('subprocesses', $subprocess_all);
			$this->set('roles', $roles);
			$this->set('display','Y');
			$this->set('id',$id);



			if($this->request->is('post')){

				$activityName = $this->data['activity_name'];
				$role1 = $this->data['role1_name'];
				$role2 = $this->data['Edit']['role2_name'];
				$role3 = $this->data['Edit']['role3_name'];
				$role4 = $this->data['Edit']['role4_name'];
				$role5 = $this->data['Edit']['role5_name'];
				$templateName = $this->data['Edit']['template_name'];
				$templateType = $this->data['Edit']['template_type'];
				$subsequence = $this->data['activity_sequence'];
				$subprocessName = $this->data['subprocess_name'];
				$ip = gethostbyname(gethostname());

				
				if($templateType == "1"){
					$templateUrl = $this->data['Edit']['template_url'];
					$updateQuery = "UPDATE activities SET name='".$activityName."', role_name1='".$role1."', role_name2='".$role2."', role_name3='".$role3."', role_name4='".$role4."', role_name5='".$role5."', template_name='".$templateName."', template_url='".$templateUrl."', template_check='".$templateType."', sub_sort='".$subsequence."' , modified_by='".$ip."', modified_date='".date("Y-m-d H:i:s")."', subprocess_id='".$subprocessName."' WHERE id='".$id."' ";
				}else{

					$updateQuery = "UPDATE activities SET name='".$activityName."', role_name1='".$role1."', role_name2='".$role2."', role_name3='".$role3."', role_name4='".$role4."', role_name5='".$role5."', template_name='".$templateName."', sub_sort='".$subsequence."' , modified_by='".$ip."', modified_date='".date("Y-m-d H:i:s")."', subprocess_id='".$subprocessName."' WHERE id='".$id."' ";
		     		if(!empty($this->data['Edit']['template_file']['name'])){
		                $file = $this->data['Edit']['template_file']; //put the data into a var for easy use

		                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
		                $arr_ext = array('docx', 'docm', 'doc','dotx','dotm','dot','pdf','xps','rtf','txt','xml','odt','wps','xls','xlsm','xlsb','xlsx','xltx','xltm','xlt','csv','pptx','pptm','ppt','potx','potm','pot','ppsx','ppsm','pps','ppam','ppa');

		                //only process if the extension is valid
		                if(in_array($ext, $arr_ext)) {
		                    //do the actual uploading of the file. First arg is the tmp name, second arg is
		                    //where we are putting it
		                    move_uploaded_file($file['tmp_name'], WWW_ROOT. 'uploadfile/'.$file['name']);

		                    //prepare the filename for database entry
		                    $templatefile = $file['name'];

		                    //$data['img_name1'] = $imgname1;
		                    $updateQuery = "UPDATE activities SET name='".$activityName."', role_name1='".$role1."', role_name2='".$role2."', role_name3='".$role3."', role_name4='".$role4."', role_name5='".$role5."', template_name='".$templateName."', template_file='".$templatefile."', template_check='".$templateType."' , sub_sort='".$subsequence."' ,  modified_by='".$ip."', modified_date='".date("Y-m-d H:i:s")."', subprocess_id='".$subprocessName."' WHERE id='".$id."' ";

		                }

		            }

				}


				$this->Activity->query($updateQuery);
				$this->redirect(array("controller" => "activity", 
                  			"action" => "activity_management",
		        ));


			}


		}else{
			$this->set('display','N');

		}




	}

	public function delete(){
		App::uses('Security', 'Utility');
	    $key = 'JKcPpZgbwUaJcfGZK1gcsCYSwr1eTzsf';
	    $id = ($_GET['id'] == NULL || $_GET['id'] == '') ? '' : Security::decrypt($_GET['id'] , $key);
		
		if($id != '') {

			$this->Activity->delete($id);
			$this->Session->setFlash(__('The activity has been deleted!'), 'alert', array(
			    'plugin' => 'TwitterBootstrap',
			    'class' => 'alert-error'
			));

			$this->redirect(array("controller" => "activity", 
                  "action" => "activity_management",
                )
          	
          	);
		}
		
	}

	public function listactivity(){
		$this->loadModel('Activity');
		$process = (isset($this->request->named['process'])) ? $this->request->named['process'] : ''; 
		$subprocess = (isset($this->request->named['subprocess'])) ? $this->request->named['subprocess'] : '';


		if($process != '' && $subprocess != ''){

			if($subprocess == '0'){

				$myquery = "SELECT 
				activities.id,
				activities.name
				FROM activities, subprocesses
				WHERE activities.subprocess_id = subprocesses.id
				AND subprocesses.process_id = '".$process."'
				ORDER BY activities.sub_sort ASC
				";

			}else{
				
				$myquery = "SELECT 
				activities.id,
				activities.name
				FROM activities
				WHERE activities.subprocess_id = '".$subprocess."'
				ORDER BY activities.sub_sort ASC
				";



			}

		}
	

		$check_query = $this->Activity->query($myquery);
		$this->set('activities',$check_query);



	}

	public function activity_management(){


		// Process and sub content
		$this->loadModel('Process');
		$querypm = $this->Process->find('all', array('conditions' => array('id' => 1)));
		$querysi = $this->Process->find('all', array('conditions' => array('id' => 2)));
   		$this->set('pullpm', $querypm);
        $this->set('pullsi', $querysi);
		



	}

	public function content_management(){

		
	}


}

?>