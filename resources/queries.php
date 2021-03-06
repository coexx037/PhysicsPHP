<?php

/**********************************Solve steps query************************/

$sql3 = "select 
        dummy,
        direction,
        case direction
          when '+' then solveline.pstring
            when '-' then solveline.nstring
            else solveline.sstring
            end as solution
        from
        
        (select 
        *,
        
/* A dummy table is used to ensure the correct number of solutions steps are displayed in the correct order. */        
        
            substring_index(substring_index(outpath, ',', dummy), ',', -1) as 'solveline'
            from dummy,
        
        (select
        *,

/*                            
* The below correlated subquery counts the number of input variables
* that are found in a given solution block, for the given user.
*/ 
        
            @countcontain:= (select count(c.block_id)
                  from probs oo, blocks c
                  where username = '$user_id'
                  and c.block_id = b.block_id
                            and find_in_set(varSolve, inpath) > 0) as 'countcontain',

/*                            
* The below correlated subquery counts the number of distinct solution blocks
* which contain the max count of matching input variables, for the given user.                           
*/                             
           
            @checkd:= (select count(distinct c.block_id)
                  from probs oo, blocks c
                  where username = '$user_id'
                  and c.inpath_length >= b.inpath_length
                            and inpath_length = (select count(c.block_id)
                        from probs zz, blocks qq
                        where username = '$user_id'
                        and qq.block_id = c.block_id
                        and find_in_set(varSolve, inpath) > 0)) as 'checkd',
                        
/* The following if statement ensures that solution block meets all of the solution criteria */                        
                                        
        if(inpath_length = @countcontain and @checkd = 1, b.block_id, 0) as 'finalblock'
        
                
                       
        from
          probs a, blocks b
        where
          username = '$user_id') as T
        
        where dummy <= outpath_length and finalblock <> 0
        group by solveline
        order by dummy) as U
        
        inner join solveline
        on U.solveline = solveline.solveline;";
        
/*******************************Solve Query****************************/        

$sql4 = "select 
        id,
        variable,
        val,
        units,
        username,
        varsolve,
        conc,
        
/* Values are converted based on the given units */        
        
        if(find_in_set(varSolve, inpath) > 0, val/unitconversions.conversion, 0) as 'converted_value',
        if(solveFor = 's', conversion, null) as 'solve_conversion'
        
        from
        
        (select
        *,

/* @conc defines the unique variable to be solved */
        
        	@conc:= (select concat(direction, variable, solveFor)
        			from probs oo
                    where username = '$user_id'
                    and solveFor = 's') as conc,
                    
/*                            
* The below correlated subquery counts the number of input variables
* that are found in a given solution block, for the given user.
*/                        
      
          @countcontain:= (select count(c.block_id)
        					from probs oo, blocks c
        					where username = '$user_id'
        					and c.block_id = b.block_id
                            and find_in_set(varSolve, inpath) > 0) as 'countcontain',
 
/*                            
* The below correlated subquery counts the number of distinct solution blocks
* which contain the max count of matching input variables, for the given user.                           
*/                            
            @checkd:= (select count(distinct c.block_id)
        					from probs oo, blocks c
        					where username = '$user_id'
        					and c.inpath_length >= b.inpath_length
                            and inpath_length = (select count(c.block_id)
        								from probs zz, blocks qq
        								where username = '$user_id'
        								and qq.block_id = c.block_id
        								and find_in_set(varSolve, inpath) > 0)) as 'checkd',

/* The following if statement ensures that solution block meets all of the solution criteria */ 
                                        
        if(inpath_length = @countcontain and @checkd = 1, b.block_id, 0) as 'finalblock'
        
        from
        	probs a, blocks b
        where
        	username = '$user_id') as T
        
        inner join unitconversions
        on T.units = unitconversions.unit
        where T.finalblock<>0";
        
?>        