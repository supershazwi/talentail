@extends ('layouts.main')

@section ('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-11">
        <section class="py-4 py-lg-5">
            <h1 class="display-4 mb-3">How do I create projects?</h1>
            <a href="#" data-toggle="tooltip" data-placement="top" title="">
                <img class="avatar" src="https://storage.googleapis.com/talentail-123456789/avatars/bQu8FWiE6cGuc4nY76euFTgRSKnjgrS6snqzmLr0.jpeg">
            </a>
            <a href="#">
              <span style="font-size: .875rem; line-height: 1.3125rem;">Shazwi Suwandi</span>
            </a>
            <p style="margin-top: 0.5rem; font-size: .875rem; line-height: 1.3125rem;">Last updated: 26<sup>th</sup> October 2018</p>
        </section>
        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-body">
                <h5>Introduction</h5>
                <p>Talentail was created for the sole purpose of providing an outlet for users to not only say what they've learned but instead apply that knowledge onto real world projects. Creators with a significant amount of experience have been invited to create projects for users to attempt.</p>
                <p>In this tutorial, we will go through what it takes to produce a complete project, one that is ready to be attempted by users and assessed by creators.</p>
                <br/>
                <h5>Step 0: Apply to be a Creator</h5>
                <p>If you are already a creator, proceed to Step 2. We place high importance on the quality of the creators that are on Talentail. Therefore, one has to <a href="/projects/create">apply</a> to become a creator.</p>
                <figure>
                  <img src="/img/apply-creator.png" style="width: 100%; border-radius: 5px;" />
                  <figcaption style="text-align: center; color: #6c757d !important;" class="text-small">Creator Application Form</figcaption>
                </figure>
                <br />
                <p>Once you've applied as a creator, you can create projects. Complete projects include:</p>
                <ol>
                  <li><strong>Title</strong> - has to be unique</li>
                  <li><strong>Short description</strong> - this will be visible when users browse projects</li>
                  <li><strong>Full description & role brief</strong> - more depth has to be given for the project and also what is expected out of the role</li>
                  <li><strong>Tasks</strong> - users who purchase projects have to attempt and submit tasks in this section</li>
                  <li><strong>Files</strong> - if there are files that can supplement the project, upload them in this section</li>
                  <li><strong>Competencies</strong> - the skills and competencies that your project assesses for</li>
                  <li><strong>Miscellaneous</strong> - project price and also duration that a user is given to complete the project</li>
                </ol>
                <br />
                <h5>Step 1: Add a Project Title, Short Description, Full Description & Role Brief</h5>
                <figure>
                  <img src="/img/create-project-1.png" style="width: 100%; border-radius: 5px;" />
                  <figcaption style="text-align: center; color: #6c757d !important;" class="text-small">Project Creation Form (1/6)</figcaption>
                </figure>
                <br />
                <p>Decide a catchy title that captures the essence of the project that you're creating. Something generic such as "Digital Transformation Project" will not suffice as there will be many other projects that are digital transformation ones. Instead, specify more details such as "Digital Transformation Project for a Mid-sized Client within the Logistics Industry". The title will be formed into a url, therefore your project title has to be unique across the entire platform.</p>
                <p>When users browse for projects on the platform, they are able to immediately see both the project title and description. Try to condense your project description down to 280 characters so that users can be given a brief overview before retrieving more details.</p>
                <figure>
                  <img src="/img/create-project-2.png" style="width: 100%; border-radius: 5px;" />
                  <figcaption style="text-align: center; color: #6c757d !important;" class="text-small">Browse Projects Page</figcaption>
                </figure>
                <br />
                <h5>Step 2: Add Project Tasks</h5>
                <p>When creating projects for users, the way to assess their skills is through the attempting of tasks. When you select the "Step 2: Tasks" tab in the create project page, you can press the "Add Task" button and add three different kinds of task:</p>
                <ul>
                  <li>Multiple Choice Questions - both single answer and multiple answers can be enabled</li>
                  <li>Open-ended - if you need users to give an essay-like answer</li>
                  <li>N.A. - if by any chance you do not require eiter mcq nor open-ended</li>
                  <li style="list-style: none;">* All three options can be accompanied with an additional option of enabling users to upload their own files</li>
                </ul>
                <br />
                <h5>Step 3: Add Files</h5>
                <p>In case you want to add supplementary files for users to attempt the tasks, add the necessary files in this section. It is advisable that you store all the files in a single folder for easier upload. In case you want to select multiple files, you can select a whole row of files by selecting the first file and pressing the "Shift" button or by selecting individual files by pressing either the "Ctrl" button on Windows or the "Command" button on Mac.</p>
                <figure style="width: 47.5%; float: left;">
                  <img src="/img/create-project-4.gif" style="width: 100%; border-radius: 5px;" />
                  <figcaption style="text-align: center; color: #6c757d !important;" class="text-small">Selecting a Row of Files using Shift Key</figcaption>
                </figure>
                <figure style="width: 47.5%; float: right;">
                  <img src="/img/create-project-5.gif" style="width: 100%; border-radius: 5px;" />
                  <figcaption style="text-align: center; color: #6c757d !important;" class="text-small">Selecting Individual Files using Ctrl/Option Key</figcaption>
                </figure>
                <br style="clear:both;"/>
                <br/> 
                <h5>Step 4: Map Competencies</h5>
                <p>All projects have to assess users based on a set of competencies. Each role has been pre-populated with a standard list of competencies. As a creator, you have to decide what specific competencies that your project is assessing for and map that. If there is ever a case whereby the competency you're looking for is not in the standard list, you can add your own custom competency that is unique to the role and the project. This custom competency can only be accessed by you and not other creators.</p>
                <br />
                <h5>Step 5: Add Miscellaneous Information</h5>
                <p>You have to add the price to your project before users can purchase it, attempt the tasks on it and get assessed by you. On top of that, as a way to encourage users to complete the project, please decide the allocated time for each user to complete the project. The amount of hours you add onto the project will determine the deadline for users. Once this deadline is reached, the project will be closed and will not allow users to submit any more answers.</p>
                <br />
                <div id="disqus_thread"></div>
                <script>

                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                
                var disqus_config = function () {
                this.page.url = "https://talentail.com/tutorials/create-projects";  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = "How do I create projects?"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://talentail.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <input type="hidden" id="loggedInUserId" value="{{Auth::id()}}" />

  <script type="text/javascript">
      $(function () {
          if(document.getElementById('loggedInUserId').value != "") {
            var pusher = new Pusher("5491665b0d0c9b23a516", {
              cluster: 'ap1',
              forceTLS: true,
              auth: {
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  }
            });

            toastr.options = {
                positionClass: 'toast-bottom-right'
            };     

            var messageChannel = pusher.subscribe('messages_' + document.getElementById('loggedInUserId').value);
            messageChannel.bind('new-message', function(data) {
                toastr.options.onclick = function () {
                    window.location.replace(data.url);
                };

                toastr.info("<strong>" + data.username + "</strong><br />" + data.message); 
            });

            var purchaseChannel = pusher.subscribe('purchases_' + document.getElementById('loggedInUserId').value);
            purchaseChannel.bind('new-purchase', function(data) {
                toastr.success(data.username + ' ' + data.message); 
            });
          }
      })
  </script>
@endsection

@section ('footer')
    
    

@endsection