program define get_elements
#delimit ;
	use employees, clear;
	foreach vvv in firstname lastname{; 
		gen location =strpos(all," ");
		gen firstname = substr(all,1,loc-1);
		replace all = substr(all,loc,.);
		l ;
	};
end;




