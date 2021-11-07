/*
  Assorted Javascript Functions for FlashDen website v2.
  Author: Ryan Allen / Collis Ta'eed (March 2007)
*/

function expand_nav(link)
{
	var ul = find_enclosing_ul(link)
	if (ul.style.display == 'none')
	{
		ul.style.display = 'block'
	}
	else
	{
		ul.style.display = 'none'
	}
	if (link.className == 'down')
	{
		link.className='down_open'
	}
	else
	{
		link.className='down'
	}
}
		
function find_enclosing_ul(link)
{
	var search_node = link
	while (true)
	{
		var node = search_node.nextSibling
		if (node && node.nodeName == 'UL')
		{
			break
		}
		else
		{
			search_node = node
		}
	}
	return node	
}