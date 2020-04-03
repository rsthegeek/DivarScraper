#Divar Crawler

CronJobs:
```bash
*/10 * * * * cd /home/bonyad_beta/dc && /opt/remi/php73/root/usr/bin/php main.php high high >> /dev/null 2>&1
15 * * * * cd /home/bonyad_beta/dc && /opt/remi/php73/root/usr/bin/php main.php high low >> /dev/null 2>&1
30 */3 * * * cd /home/bonyad_beta/dc && /opt/remi/php73/root/usr/bin/php main.php low high >> /dev/null 2>&1
0 1,13 * * * cd /home/bonyad_beta/dc && /opt/remi/php73/root/usr/bin/php main.php low low >> /dev/null 2>&1
```
