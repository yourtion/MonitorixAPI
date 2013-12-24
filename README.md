## MonitorixAPI

### Description

Provide a series of Monitorix API using PHP.

### Requirements

 * Monitorix
 * Apache/Nginx
 * PHP

### Configuration

Rename config.php.sample to config.php and set your HOST to begin.

If you change the Monitorix path ,set your path.

If you have web Authenticate please config the USER and PASSWD.

### How to use?
1. access `index.php` without parameter you can get all the option from Monitorix

Success return:
	{
		when: {
			1day: "Daily",
			1week: "Weekly",
			1month: "Monthhly",
			1year: "Yearly"
		},
		graph: {
			System load average and usage: {
				_system1: "System load",
				_system2: "Active processes",
				_system3: "Memory allocation"
			},
			........
		}
	}

2. access `index.php` with `act=page` like `index.php?act=page` to get all Daily graph.
3. access `index.php` with `act=page` and `when` like `index.php?act=page&when=1week` to get all other timeing graph.

> `when` canbe `1day` for Daily , `1week` for 1week , `1month` for Monthhly and  `1year` for Yearly .

4. access `index.php` with `act=page` ,`when` and `graph` like `index.php?act=page&when=1week&graph=_system1` to get special timeing graph.

> `graph` detaile see the `graph` you get on Monitorix option. like `_system1`

Success return:

	{
		System load average and usage: {
			System load: "http://host/monitorix/imgs/system1z.1week.png",
			Active processes: "http://host/monitorix/imgs/system2z.1week.png",
			Memory allocation: "http://host/monitorix/imgs/system3z.1week.png"
		},
		...
	}


### License

MonitorixAPI is licensed under the MIT License.

### Author

Yourtion <yourtion@gmail.com>
@yourtion
