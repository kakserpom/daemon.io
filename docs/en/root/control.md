## control # Control

<table class="invis">
  <tr>
    <td class="nowrap">$ <code>phpd start</code></td>
    <td>Запуск демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd stop</code></td>
    <td>Остановка демона<br><code>SYSCTL: SIGTERM, SIGQUIT</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd hardstop</code></td>
    <td>Принудительная остановка демона<br><code>SYSCTL: SIGINT, SIGKILL</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd update</code></td>
    <td>Обновление конфигурации<br><code>SYSCTL: SIGHUP</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd reload</code></td>
    <td>Плавный перезапуск всех рабочих процессов<br><code>SYSCTL: SIGUSR2</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd reopenlog</code></td>
    <td>Переоткрытие журналов<br><code>SYSCTL: SIGUSR1</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd restart</code></td>
    <td>Плавный перезапуск демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd hardrestart</code></td>
    <td>Принудительный перезапуск демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd status</code></td>
    <td>Вывод статуса демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd fullstatus</code></td>
    <td>Вывод подробной информации работы демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd configtest</code></td>
    <td>Вывод глобальных опций. В скобках будет указано значение по-умочанию.</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd log [-n K]</code></td>
    <td>Вывод журнала в реальном времени с помощью команды <code>tail -f</code>. C параметром <code>-n K</code> выводится K последних строк. Или используйте <code>-n +K</code> для вывода строк, начиная с K.</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd runworker</code></td>
    <td>Запуск рабочего процесса без мастер-процесса. Используется для отладки.</td>
  </tr>
</table>