<?php 
session_start();
class MainController extends AppController {


	public function rolechange2(){
		$this->layout = false;
		$this->loadModel('Activity');
		$this->loadModel('Process');

		if($_POST['subselect'] != "" && $_POST['subselect'] != NULL){
			$changequery = "SELECT 
			activities.name,
			activities.role_name1,
			activities.role_name2,
			activities.role_name3,
			activities.role_name4,
			activities.role_name5,
			activities.sub_sort,
			activities.template_url,
			subprocesses.id,
			subprocesses.name,
			subprocesses.intro_description,
			subprocesses.main_description,
			processes.id,
			processes.name,
			processes.description
			FROM activities,subprocesses,processes
			WHERE activities.subprocess_id = subprocesses.id
			AND subprocesses.process_id = processes.id
			AND subprocesses.id = '".$_POST['subselect']."'
			AND ( activities.role_name1 = '".$_POST['role']."' OR activities.role_name2 = '".$_POST['role']."' OR activities.role_name3 = '".$_POST['role']."' OR activities.role_name4 = '".$_POST['role']."' OR activities.role_name5 = '".$_POST['role']."')
			ORDER BY processes.id ASC, subprocesses.id ASC, activities.sub_sort ASC
			";


		}else{
			$changequery = "SELECT 
			activities.name,
			activities.role_name1,
			activities.role_name2,
			activities.role_name3,
			activities.role_name4,
			activities.role_name5,
			activities.sub_sort,
			activities.template_url,
			subprocesses.id,
			subprocesses.name,
			subprocesses.intro_description,
			subprocesses.main_description,
			processes.id,
			processes.name,
			processes.description
			FROM activities,subprocesses,processes
			WHERE activities.subprocess_id = subprocesses.id
			AND subprocesses.process_id = processes.id
			AND subprocesses.process_id = '".$_POST['ddpc']."'
			AND ( activities.role_name1 = '".$_POST['role']."' OR activities.role_name2 = '".$_POST['role']."' OR activities.role_name3 = '".$_POST['role']."' OR activities.role_name4 = '".$_POST['role']."' OR activities.role_name5 = '".$_POST['role']."')
			ORDER BY processes.id ASC, subprocesses.id ASC, activities.sub_sort ASC
			";
		}

			$cquery = $this->Activity->query($changequery);
			$this->set('cquery',$cquery);

	}


	public function rolechange(){
		$this->layout = false;
		$this->loadModel('Activity');
		$this->loadModel('Process');



		if($_POST['ddpc'] != "" && $_POST['ddpc'] != NULL){

			$myquery = "SELECT subprocesses.id,subprocesses.name FROM subprocesses WHERE subprocesses.process_id = '".$_POST['ddpc']."' ";

			$check_query = $this->Process->query($myquery);
			$this->set('query',$check_query);


			$changequery = "SELECT 
			activities.name,
			activities.role_name1,
			activities.role_name2,
			activities.role_name3,
			activities.role_name4,
			activities.role_name5,
			activities.sub_sort,
			activities.template_url,
			subprocesses.id,
			subprocesses.name,
			subprocesses.intro_description,
			subprocesses.main_description,
			processes.id,
			processes.name,
			processes.description
			FROM activities,subprocesses,processes
			WHERE activities.subprocess_id = subprocesses.id
			AND subprocesses.process_id = processes.id
			AND subprocesses.process_id = '".$_POST['ddpc']."'
			AND ( activities.role_name1 = '".$_POST['role']."' OR activities.role_name2 = '".$_POST['role']."' OR activities.role_name3 = '".$_POST['role']."' OR activities.role_name4 = '".$_POST['role']."' OR activities.role_name5 = '".$_POST['role']."')
			ORDER BY processes.id ASC, subprocesses.id ASC, activities.sub_sort ASC
			";

		


		}else{

			$changequery = "SELECT 
			activities.name,
			activities.role_name1,
			activities.role_name2,
			activities.role_name3,
			activities.role_name4,
			activities.role_name5,
			activities.sub_sort,
			activities.template_url,
			subprocesses.id,
			subprocesses.name,
			subprocesses.intro_description,
			subprocesses.main_description,
			processes.id,
			processes.name,
			processes.description
			FROM activities,subprocesses,processes
			WHERE activities.subprocess_id = subprocesses.id
			AND subprocesses.process_id = processes.id
			AND (activities.role_name1 = '".$_POST['role']."' OR activities.role_name2 = '".$_POST['role']."' OR activities.role_name3 = '".$_POST['role']."' OR activities.role_name4 = '".$_POST['role']."' OR activities.role_name5 = '".$_POST['role']."')
			ORDER BY processes.id ASC, subprocesses.id ASC, activities.sub_sort ASC
			";



		}



			$cquery = $this->Activity->query($changequery);
			$this->set('cquery',$cquery);


	}

	public function subprocesschange(){
		$this->layout = false;
		$this->loadModel('Activity');

		if($_POST['ddrole'] != "" && $_POST['ddrole'] != NULL){

			$myquery = "SELECT 
			activities.name,
			activities.role_name1,
			activities.role_name2,
			activities.role_name3,
			activities.role_name4,
			activities.role_name5,
			activities.sub_sort,
			activities.template_url,	
			activities.template_file,
			activities.template_check
			FROM activities
			WHERE activities.subprocess_id = '".$_POST['subprocess']."' 
			AND (activities.role_name1 = '".$_POST['ddrole']."' OR activities.role_name2 = '".$_POST['ddrole']."' OR activities.role_name3 = '".$_POST['ddrole']."' OR activities.role_name4 = '".$_POST['ddrole']."' OR activities.role_name5 = '".$_POST['ddrole']."') 
			ORDER BY activities.sub_sort ASC
			";

		}else{

			$myquery = "SELECT 
			activities.name,
			activities.role_name1,
			activities.role_name2,
			activities.role_name3,
			activities.role_name4,
			activities.role_name5,
			activities.sub_sort,
			activities.template_url,
			activities.template_file,
			activities.template_check
			FROM activities 
			WHERE activities.subprocess_id = '".$_POST['subprocess']."'
			ORDER BY activities.sub_sort ASC
			";


		}


		$check_query = $this->Activity->query($myquery);
		$this->set('tabledata',$check_query);

	}

	public function processchange(){
		$this->layout = false;
		$this->loadModel('Activity');

		if($_POST['ddcheck'] != "" && $_POST['ddcheck'] != NULL){
			
			if($_POST['ddrole'] != "" && $_POST['ddrole'] != NULL){
				$myquery = "SELECT 
				activities.name,
				activities.role_name1,
				activities.role_name2,
				activities.role_name3,
				activities.role_name4,
				activities.role_name5,
				activities.sub_sort,
				activities.template_url,
				subprocesses.id,
				subprocesses.name
				FROM activities,subprocesses 
				WHERE subprocesses.id =  activities.subprocess_id
				AND subprocesses.name = '".$_POST['ddcheck']."'
				AND (activities.role_name1 = '".$_POST['ddrole']."' OR activities.role_name2 = '".$_POST['ddrole']."' OR activities.role_name3 = '".$_POST['ddrole']."' OR activities.role_name4 = '".$_POST['ddrole']."' OR activities.role_name5 = '".$_POST['ddrole']."' )
				ORDER BY subprocesses.name ASC, activities.sub_sort ASC
				";


			}else{
				$myquery = "SELECT 
				activities.name,
				activities.role_name1,
				activities.role_name2,
				activities.role_name3,
				activities.role_name4,
				activities.role_name5,
				activities.sub_sort,
				activities.template_url,
				subprocesses.id,
				subprocesses.name
				FROM activities,subprocesses 
				WHERE subprocesses.id =  activities.subprocess_id
				AND subprocesses.name = '".$_POST['ddcheck']."'
				ORDER BY subprocesses.name ASC, activities.sub_sort ASC
				";


			}

	


		}else{


			if($_POST['ddrole'] != "" && $_POST['ddrole'] != NULL){

				$myquery = "SELECT 
				activities.name,
				activities.role_name1,
				activities.role_name2,
				activities.role_name3,
				activities.role_name4,
				activities.role_name5,
				activities.sub_sort,
				activities.template_url,
				subprocesses.id,
				subprocesses.name
				FROM activities,subprocesses 
				WHERE subprocesses.id =  activities.subprocess_id
				AND subprocesses.process_id = '".$_POST['pccheck']."'
				AND (activities.role_name1 = '".$_POST['ddrole']."' OR activities.role_name2 = '".$_POST['ddrole']."' OR activities.role_name3 = '".$_POST['ddrole']."' OR activities.role_name4 = '".$_POST['ddrole']."' OR activities.role_name5 = '".$_POST['ddrole']."' )
				ORDER BY subprocesses.name ASC, activities.sub_sort ASC
				";

			}else{
				$myquery = "SELECT 
				activities.name,
				activities.role_name1,
				activities.role_name2,
				activities.role_name3,
				activities.role_name4,
				activities.role_name5,
				activities.sub_sort,
				activities.template_url,
				subprocesses.id,
				subprocesses.name
				FROM activities,subprocesses 
				WHERE subprocesses.id =  activities.subprocess_id
				AND subprocesses.process_id = '".$_POST['pccheck']."'
				ORDER BY subprocesses.name ASC, activities.sub_sort ASC
				";

			}
			




		}

		
		$check_query = $this->Activity->query($myquery);
		$this->set('tabledata',$check_query);

	}


	public function displayimage(){
		$_SESSION["page"] = 3;
		$this->loadModel('Process');

		$id = (isset($this->request->named['id'])) ? $this->request->named['id'] : ''; 
		$process = (isset($this->request->named['pc'])) ? $this->request->named['pc'] : ''; 
        $des = (isset($this->request->named['des'])) ? $this->request->named['des'] : ''; 

	    if($des == "1"){
	        $processque = $this->Process->find('all',array('conditions' => array('Process.id' => $id),'fields' => array('img_des1')));
	    }else if($des == "2"){
	        $processque = $this->Process->find('all',array('conditions' => array('Process.id' => $id),'fields' => array('img_des2')));
	    }else if($des == "3"){
	        $processque = $this->Process->find('all',array('conditions' => array('Process.id' => $id),'fields' => array('img_des3')));
	    }else{
	        $processque = $this->Process->find('all',array('conditions' => array('Process.id' => $id),'fields' => array('img_des4')));
	    }


		$this->set('query', $processque);
	}

	public function displaysubprocess(){
		$_SESSION["page"] = 3;
		$this->loadModel('Subprocess');
		$this->loadModel('Activity');

		$sprocess = (isset($this->request->named['subprocess'])) ? $this->request->named['subprocess'] : '';
		$sprocessque = $this->Subprocess->find('all',array('conditions' => array('Subprocess.id' => $sprocess)));
		$this->set('subprocess', $sprocessque);



		$myquery = "SELECT 
		activities.name,
		activities.role_name1,
		activities.role_name2,
		activities.role_name3,
		activities.role_name4,
		activities.role_name5,
		activities.sub_sort,
		activities.template_url,
		activities.template_file,
		activities.template_check
		FROM activities 
		WHERE activities.subprocess_id = '".$sprocess."'
		ORDER BY activities.sub_sort ASC
		";

		$check_query = $this->Activity->query($myquery);

		$this->set('tabledata',$check_query);
		$this->set('ispc',$sprocess);
		




	}



	public function displayprocess(){
		$_SESSION["page"] = 3;

		$this->loadModel('Process');
		$this->loadModel('Subprocess');
		$this->loadModel('Activity');

		//Process check
		$querypm = $this->Process->find('all', array('conditions' => array('id' => 1)));
		$querysi = $this->Process->find('all', array('conditions' => array('id' => 2)));
   		$this->set('pullpm', $querypm);
        $this->set('pullsi', $querysi);


		$process = (isset($this->request->named['process'])) ? $this->request->named['process'] : '';

		
		$processque = $this->Process->find('all',array('conditions' => array('Process.id' => $process)));

		$myquery = "SELECT 
		activities.name,
		activities.role_name1,
		activities.role_name2,
		activities.role_name3,
		activities.role_name4,
		activities.role_name5,
		activities.sub_sort,
		activities.template_url,
		activities.template_file,
		activities.template_check,
		subprocesses.name,
		subprocesses.id
		FROM activities,subprocesses 
		WHERE subprocesses.id =  activities.subprocess_id
		AND subprocesses.process_id = '".$process."'
		ORDER BY subprocesses.name ASC, activities.sub_sort ASC
		";

		$myquerysub = "SELECT subprocesses.name FROM subprocesses WHERE subprocesses.process_id = '".$process."' ORDER BY subprocesses.id ASC ";


		$check_query = $this->Activity->query($myquery);
		$check_querysub = $this->Subprocess->query($myquerysub);

		$this->set('query', $processque);
		$this->set('tabledata',$check_query);
		$this->set('sub',$check_querysub);
		$this->set('ipc',$process );
		$this->set('forimg',$process);


	}
	public function displayrole(){
		$_SESSION["page"] = 2;
		$this->loadModel('Activity');
		$this->loadModel('Process');
		$this->loadModel('Role');


		$role = (isset($this->request->named['role'])) ? $this->request->named['role'] : '';


		$myquery = "SELECT 
		activities.name,
		activities.role_name1,
		activities.role_name2,
		activities.role_name3,
		activities.role_name4,
		activities.role_name5,
		activities.sub_sort,
		activities.template_url,
		activities.template_file,
		activities.template_check,
		subprocesses.id,
		subprocesses.name,
		subprocesses.intro_description,
		subprocesses.main_description,
		processes.id,
		processes.name,
		processes.description
		FROM activities,subprocesses,processes
		WHERE activities.subprocess_id = subprocesses.id
		AND subprocesses.process_id = processes.id
		AND (activities.role_name1 = '".$role."' OR activities.role_name2 = '".$role."' OR activities.role_name3 = '".$role."' OR activities.role_name4 = '".$role."' OR activities.role_name5 = '".$role."')
		ORDER BY processes.id ASC, subprocesses.id ASC, activities.sub_sort ASC
		";


		$pcshow = "SELECT processes.id,processes.name FROM processes";
		$roledes = "SELECT roles.intro_description, roles.main_description FROM roles WHERE roles.name = '".$role."' ";



        $check_query = $this->Activity->query($myquery);
        $pc_query = $this->Process->query($pcshow);
        $roledes = $this->Role->query($roledes);

		$this->set('query',$check_query);
		$this->set('pcquery',$pc_query);
		$this->set('role',$role);
		$this->set('roledes',$roledes);
		

	}


	public function resultchange(){
		$this->layout = false;
		$string;


		if($_POST['ddcheck'] == "0"){
			$string = "Process name is";


		}else if($_POST['ddcheck'] == "1"){
			$string = "I'm a";

		}else{
			$string = "Document name is";	
		}

		$this->set('string',$string);

	}

	public function resultprocess(){
		$_SESSION["page"] = 99;

  		$this->loadModel('Role');


		//Footer set & Some content
		$this->loadModel('Process');
		$querypm = $this->Process->find('all', array('conditions' => array('id' => 1)));
		$querysi = $this->Process->find('all', array('conditions' => array('id' => 2)));
   		$this->set('pullpm', $querypm);
        $this->set('pullsi', $querysi);



		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";


        $check_query = $this->Role->query($myquery);


        $this->set('queryrole', $check_query);


		$this->loadModel('Activity');
		$txt = $this->request->named['txt'];

			if($txt != NULL || $txt != ''){

				$select_option = "processes.name LIKE '%".$txt."%' OR processes.short_name LIKE '%".$txt."%'";
				$select_option .= "OR subprocesses.name LIKE '%".$txt."%' OR subprocesses.short_name LIKE '%".$txt."%'";
				$select_option .= "OR activities.name = '".$txt."' ";

				$myquery = "SELECT 
				activities.role_name1,
				activities.role_name2,
				activities.role_name3,
				activities.role_name4,
				activities.role_name5,
				activities.subprocess_id,
				subprocesses.id,
				subprocesses.name,
				subprocesses.process_id,
				processes.name
				FROM activities,subprocesses,processes 
				WHERE activities.subprocess_id = subprocesses.id 
				AND subprocesses.process_id = processes.id 
				AND (".$select_option.") ";

		        $check_query = $this->Activity->query($myquery);
		        $this->set('query', $check_query);


		       

			
			}else{}

		if($this->request->is('post')){
			
			$searchtype = $this->data['ddtype'];
			if($searchtype == 0){

				$this->redirect(array("controller" => "Main", 
                  "action" => "resultprocess",
                  "txt" => $this->request->data['searchinprocess']['textsearch'],
                  )
    
          		);

			}else if($searchtype == 1){
				$this->redirect(array("controller" => "Main", 
                  "action" => "resultrole",
                  "txt" => $this->request->data['searchinprocess']['textsearch'],
                  )
    
          		);


			}else{
				$this->redirect(array("controller" => "Main", 
                  "action" => "resultdoc",
                  "txt" => $this->request->data['searchinprocess']['textsearch'],
                  )
    
          		);

			}


		} //end if post



	}

	public function resultrole(){
		$_SESSION["page"] = 99;

  		$this->loadModel('Role');


		//Footer set & Some content
		$this->loadModel('Process');
		$querypm = $this->Process->find('all', array('conditions' => array('id' => 1)));
		$querysi = $this->Process->find('all', array('conditions' => array('id' => 2)));
   		$this->set('pullpm', $querypm);
        $this->set('pullsi', $querysi);



		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";
        $check_query = $this->Role->query($myquery);
        $this->set('queryrolef', $check_query);


		$this->loadModel('Activity');
		$txt = $this->request->named['txt'];

			if($txt != NULL || $txt != ''){

				$queryrole = "SELECT roles.name,roles.short_name,roles.intro_description,roles.main_description FROM roles WHERE roles.name LIKE '%".$txt."%' OR roles.short_name LIKE '%".$txt."%' ";

				$check_queryrole = $this->Role->query($queryrole);
				$this->set('queryrole', $check_queryrole);



				$select_option = "processes.name LIKE '%".$txt."%' OR processes.short_name LIKE '%".$txt."%'";
				$select_option .= "OR subprocesses.name LIKE '%".$txt."%' OR subprocesses.short_name LIKE '%".$txt."%'";
				$select_option .= "OR activities.name = '".$txt."' ";

				$myquery = "SELECT 
				activities.role_name1,
				activities.role_name2,
				activities.role_name3,
				activities.role_name4,
				activities.role_name5,
				activities.subprocess_id,
				subprocesses.name,
				subprocesses.process_id,
				processes.name
				FROM activities,subprocesses,processes 
				WHERE activities.subprocess_id = subprocesses.id 
				AND subprocesses.process_id = processes.id 
				AND (".$select_option.") ";

				//echo $myquery;

		        $check_query = $this->Activity->query($myquery);

		        //echo "<br>";
		        //print_r($check_query);
		        if($check_query){
		        	$this->set('query', $check_query);


		        }else{
		        	//Not found data
		        }

				


			}else{ }


			if($this->request->is('post')){
			
				$searchtype = $this->data['ddtype'];
				if($searchtype == 0){

					$this->redirect(array("controller" => "Main", 
	                  "action" => "resultprocess",
	                  "txt" => $this->request->data['searchinrole']['textsearch'],
	                  )
	    
	          		);

				}else if($searchtype == 1){
					$this->redirect(array("controller" => "Main", 
	                  "action" => "resultrole",
	                  "txt" => $this->request->data['searchinrole']['textsearch'],
	                  )
	    
	          		);

				}else{
					$this->redirect(array("controller" => "Main", 
	                  "action" => "resultdoc",
	                  "txt" => $this->request->data['searchinrole']['textsearch'],
	                  )
	    
	          		);

				}


		} //end if post



	}

	public function resultdoc(){
		$_SESSION["page"] = 99;

 		$this->loadModel('Role');


		//Footer set & Some content
		$this->loadModel('Process');
		$querypm = $this->Process->find('all', array('conditions' => array('id' => 1)));
		$querysi = $this->Process->find('all', array('conditions' => array('id' => 2)));
   		$this->set('pullpm', $querypm);
        $this->set('pullsi', $querysi);



		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";


        $check_query = $this->Role->query($myquery);


        $this->set('queryrole', $check_query);
		


		$this->loadModel('Activity');
		$txt = $this->request->named['txt'];

			if($txt != NULL || $txt != ''){

				$select_option = "processes.name = '".$txt."' OR processes.short_name = '".$txt."'";
				$select_option .= "OR subprocesses.name = '".$txt."' OR subprocesses.short_name = '".$txt."'";
				$select_option .= "OR activities.role_name1 = '".$txt."' OR activities.role_shortname1 = '".$txt."'";
				$select_option .= "OR activities.role_name2 = '".$txt."' OR activities.role_shortname2 = '".$txt."'";
				$select_option .= "OR activities.role_name3 = '".$txt."' OR activities.role_shortname3 = '".$txt."'";
				$select_option .= "OR activities.role_name4 = '".$txt."' OR activities.role_shortname4 = '".$txt."'";
				$select_option .= "OR activities.role_name5 = '".$txt."' OR activities.role_shortname5 = '".$txt."'";
				$select_option .= "OR activities.template_name = '".$txt."' OR activities.template_title = '".$txt."'";

				$myquery = "SELECT
				activities.template_name,
				activities.template_title,
				activities.template_url,
				activities.template_file,
				activities.template_check,
				activities.name,
				activities.role_name1,
				activities.role_name2,
				activities.role_name3,
				activities.role_name4,
				activities.role_name5,
				activities.modified_date,
				subprocesses.id,
				subprocesses.name,
				processes.name,
				processes.id
				FROM activities,subprocesses,processes 
				WHERE activities.subprocess_id = subprocesses.id 
				AND subprocesses.process_id = processes.id 
				AND (".$select_option.") ";



		        $check_query = $this->Activity->query($myquery);


		        if($check_query){
		        	$this->set('query', $check_query);
		        }

				


			}else{ }



			if($this->request->is('post')){
			
				$searchtype = $this->data['ddtype'];
				if($searchtype == 0){

					$this->redirect(array("controller" => "Main", 
	                  "action" => "resultprocess",
	                  "txt" => $this->request->data['searchindoc']['textsearch'],
	                  )
	    
	          		);

				}else if($searchtype == 1){
					$this->redirect(array("controller" => "Main", 
	                  "action" => "resultrole",
	                  "txt" => $this->request->data['searchindoc']['textsearch'],
	                  )
	    
	          		);

				}else{
					$this->redirect(array("controller" => "Main", 
	                  "action" => "resultdoc",
	                  "txt" => $this->request->data['searchindoc']['textsearch'],
	                  )
	    
	          		);

				}


		} //end if post

		

	}

	public function searchprocess(){
		$_SESSION["page"] = 99;

 		$this->loadModel('Role');

		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";


        $check_query = $this->Role->query($myquery);


        $this->set('queryrole', $check_query);

		// if($this->request->is('post')){
				
		// 	$this->redirect(array("controller" => "Main", 
  //                 "action" => "resultprocess",
  //                 "txt" => $this->request->data['searchforprocess']['textsearch'],
  //                 )
    
  //         	);


		// }


	}

	public function searchrole(){
		$_SESSION["page"] = 99;

 		$this->loadModel('Role');

		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";


        $check_query = $this->Role->query($myquery);


        $this->set('queryrole', $check_query);


		// if($this->request->is('post')){
		// 	$this->redirect(array("controller" => "Main", 
  //                 "action" => "resultrole",
  //                 "txt" => $this->request->data['searchforrole']['textsearch'],
  //                 )
    
  //         	);


		// }

	}

	public function searchdoc(){
		$_SESSION["page"] = 99;

		$this->loadModel('Role');

		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";


        $check_query = $this->Role->query($myquery);


        $this->set('queryrole', $check_query);

		if($this->request->is('post')){
			$this->redirect(array("controller" => "Main", 
                  "action" => "resultdoc",
                  "txt" => $this->request->data['searchfordoc']['textsearch'],
                  )
    
          	);


		}

	}

	public function about(){
		$_SESSION["page"] = 5;

		$this->loadModel('Role');
		$this->loadModel('About');

		//Footer set
		$this->loadModel('Process');
		$querypm = $this->Process->find('all', array('conditions' => array('id' => 1)));
		$querysi = $this->Process->find('all', array('conditions' => array('id' => 2)));
   		$this->set('pullpm', $querypm);
        $this->set('pullsi', $querysi);


		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";
		$aboutquery = "SELECT header_name,subheader_name1,subheader_description1,subheader_name2,subheader_description2 FROM abouts   ";


        $check_query = $this->Role->query($myquery);
        $pullabout = $this->About->query($aboutquery);


        $this->set('queryrole', $check_query);
        $this->set('pullabout', $pullabout);
	}


	public function document(){
		$_SESSION["page"] = 4;
		$this->loadModel('Activity');

		$myquery = "SELECT
		activities.template_name,
		activities.template_title,
		activities.template_url,
		activities.template_file,
		activities.template_check,
		activities.name,
		activities.role_name1,
		activities.role_name2,
		activities.role_name3,
		activities.role_name4,
		activities.role_name5,
		activities.modified_date,
		subprocesses.id,
		subprocesses.name,
		processes.name,
		processes.id
		FROM activities,subprocesses,processes 
		WHERE activities.subprocess_id = subprocesses.id 
		AND subprocesses.process_id = processes.id 
		";


		$check_query = $this->Activity->query($myquery);


		$this->set('tabledata',$check_query);








		if($this->request->is('post')){
				
			$this->redirect(array("controller" => "Main", 
                  "action" => "resultdoc",
                  "txt" => $this->request->data['searchfordoc']['textsearch'],
                  )
    
          	);


		}

	}


	public function process(){
		$_SESSION["page"] = 3;


		$this->loadModel('Processoverview');



		// Process and sub content
		$this->loadModel('Process');
		$querypm = $this->Process->find('all', array('conditions' => array('id' => 1)));
		$querysi = $this->Process->find('all', array('conditions' => array('id' => 2)));
   		$this->set('pullpm', $querypm);
        $this->set('pullsi', $querysi);






		$query = $this->Processoverview->find('all', array('conditions' => array('id' => 1)));



		$this->set('pullprocessovv', $query);



		if($this->request->is('post')){
				
			$this->redirect(array("controller" => "Main", 
                  "action" => "resultprocess",
                  "txt" => $this->request->data['searchforprocess']['textsearch'],
                  )
    
          	);


		}


	}


	public function role(){
		$_SESSION["page"] = 2;

		$this->loadModel('Role');
		$this->loadModel('Roleoverview');
		
		$query = $this->Roleoverview->find('all', array('conditions' => array('id' => 1)));

		$this->set('pullroleovv', $query);


		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";


        $check_query = $this->Role->query($myquery);


        $this->set('queryrole', $check_query);


		if($this->request->is('post')){
			$this->redirect(array("controller" => "Main", 
                  "action" => "resultrole",
                  "txt" => $this->request->data['searchforrole']['textsearch'],
                  )
    
          	);


		}




	}


	public function index(){
		 $_SESSION["page"] = 99;

 		$this->loadModel('Role');
		$this->loadModel('About');

		//Footer set
		$this->loadModel('Process');
		$querypm = $this->Process->find('all', array('conditions' => array('id' => 1)));
		$querysi = $this->Process->find('all', array('conditions' => array('id' => 2)));
   		$this->set('pullpm', $querypm);
        $this->set('pullsi', $querysi);



		$myquery = "SELECT roles.name FROM roles ORDER BY roles.name ASC";
		$aboutquery = "SELECT header_name,subheader_name1,subheader_description1,subheader_name2,subheader_description2 FROM abouts   ";

        $check_query = $this->Role->query($myquery);
        $pullabout = $this->About->query($aboutquery);


        $this->set('queryrole', $check_query);
        $this->set('pullabout', $pullabout);


	}


}



?>