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
access `index.php` without parameter you can get all the option from Monitorix

Success return:

	{
		when: {
			1day: "Daily",
			1week: "Weekly",
			1month: "Monthly",
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


### License

MonitorixAPI is licensed under the MIT License.

### Author

Yourtion <yourtion@gmail.com>
@yourtion
