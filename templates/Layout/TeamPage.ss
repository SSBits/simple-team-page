<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		
		<div class="content">
            $Content
            
            <p>
            	Show team members in <a class="<% if CurrentDepartmentID %>link<% else %>current<% end_if %>" href="$Link">All</a> 
	            
	            <% loop Departments %>
	            	 <a class="$LinkingMode" href="{$Top.Link}department/$ID">$Title</a> 
	            <% end_loop %>
            </p>
            
            <ul>
                <% loop TeamMembers %>
                    <li>
                        $Image.CroppedImage(200,200)
                        <h2>$Name</h2>
                        <h3>$Position</h3>
                        <p>$Bio</p>
                    </li>
                <% end_loop %>
            </ul>
           
		</div>

	</article>

</div>