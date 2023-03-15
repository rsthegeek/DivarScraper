# Divar.ir Scraper for Real-Time Ad Monitoring

This is a simple and efficient scraper designed to extract real-time data from divar.ir, a popular Iranian classified advertisement website. The scraper is developed with the purpose of allowing users to receive notifications on Telegram whenever new ads matching specific keywords are posted on the website.

With this tool, users can easily monitor divar.ir for their desired items or services, without having to manually sift through numerous listings. The scraper uses advanced algorithms to track the keywords in real-time and immediately notifies users through Telegram whenever a new ad matching their criteria is posted.

This innovative solution streamlines the process of finding relevant advertisements on divar.ir, and allows users to stay updated on the latest listings with minimal effort.

CronJobs:
```bash
*/10 * * * * cd [Absolute path to project directory] && [Absolute address of php executable] main.php high high >> /dev/null 2>&1
15   * * * * cd [Absolute path to project directory] && [Absolute address of php executable] main.php high low >> /dev/null 2>&1
30 */3 * * * cd [Absolute path to project directory] && [Absolute address of php executable] main.php low high >> /dev/null 2>&1
0 1,13 * * * cd [Absolute path to project directory] && [Absolute address of php executable] main.php low low >> /dev/null 2>&1
```
