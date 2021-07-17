	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="<?php echo "$app_flogo_path";?>" alt="" class="logo">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
						<a href="index.php" class="dropdown-toggle">
							<span class="fa fa-home"></span><span class="mtext">Home</span>
						</a>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-user"></span><span class="mtext">Tutors</span>
						</a>
						<ul class="submenu">
							<li><a href="tutorApproval.php">Unapproved</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="tutorslist.php">Tutor List</a></li>
						</ul>
					</li>


					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-tasks"></span><span class="mtext">Jobs</span>
						</a>
						<ul class="submenu">
							<li><a href="applied.php">Applied in Jobs</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="unapprovedJobList.php">Unapproved Jobs</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="waitingJobs.php">Jobs Waiting for Tutor</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="approvedJobsList.php">Approved Jobs List</a></li>
						</ul>
					</li>



					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-user-plus"></span><span class="mtext">Admin</span>
						</a>
						<ul class="submenu">
							<li><a href="adminRegistration.php">Add Admin</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="vendors/Web_log_file.txt" target="_blank">Check Access Log</a></li>
						</ul>
					</li>

					

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-cog"></span><span class="mtext">Add Properties</span>
						</a>
						<ul class="submenu">
							<li><a href="addArea.php">Add Area</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="addcategory.php">Add Category</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="addSubCategory.php">Add Courses</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="addCourseWiseSubject.php">Add Course Wise Subject</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-eye"></span><span class="mtext">View Properties</span>
						</a>
						<ul class="submenu">
							<li><a href="areaList.php">View Area</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="courseList.php">View Courses</a></li>
						</ul>
						<ul class="submenu">
							<li><a href="viewSubject.php">View Subject</a></li>
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</div>