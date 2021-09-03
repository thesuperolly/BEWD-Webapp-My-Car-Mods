# My Car Mods Rationale:

My initial thoughts in wanting to create the app the way I did had two main ideas in mind:

1. To be as simple and close to a single-page app as possible whilst still being potentially usable. 

2. To be a tool I could see myself actually using.

The first idea I pursued was to design an assignment or work tracker. Thinking through this seems quite simple and easily achievable with the knowledge I have already picked up in class, but it didn’t really extend my knowledge past the tutorials. I instead thought about what tools might be useful for me in real life, and as I am interested in cars, I thought a maintenance and modification tracker would be a fun idea.
I began by figuring out what my data structure might look like as I wanted to collect all of the information in a single short form.

From there I began looking back over the work we have covered in our tutorials to see how I might apply it to this new use case. This was where I began to run into frustrations and issues. I realised quite quickly that I was potentially stretching myself and I needed to have a much stronger idea of PHP and web hosting than I realised. 

The challenges initially took on the form of understanding syntax and how to refactor existing code to get it to do what I wanted. As I was looking to minimise the number of pages needed to achieve the user flow I had in mind, I was often having to dissect each part of the CRUD process to make each page work. I also found adding user authentication a bit confusing when trying to implement it across different pages. 
Once I was relatively close to the finished app, I began the process of uploading it to the chosen host. I first tried SiteGround but quickly developed some issues with accessing the database, and delayed site propagation. 

I then signed up for dream host and deployed the site there, after some more teething issues. 
My next and most frustrating issue was regarding how hosts handle session information. I found that I couldn’t get a session to start or continue on the index file. This was all solved in the end by refactoring the site to direct users to the welcome page as the home page when signed in and the index page when signed out, simple but effective. I also moved back to SiteGround as I found their interface easier to work through and the propagation issue was eventually resolved.

The bright side of all the issues I had is I feel much more comfortable with PHP now that I have struggled through all of my issues. I also am aware that the app I have created is too simplistic to be usable in its current form but with a little work, I feel that it could be quite useful.