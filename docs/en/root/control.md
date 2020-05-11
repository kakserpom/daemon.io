## control # Control

<table class="invis">
  <tr>
    <td class="nowrap">$ <code>phpd start</code></td>
    <td>Launch daemon</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd stop</code></td>
    <td>Stop daemon<br><code>SYSCTL: SIGTERM, SIGQUIT</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd hardstop</code></td>
    <td>Force-stop daemon<br><code>SYSCTL: SIGINT, SIGKILL</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd update</code></td>
    <td>Update configuration<br><code>SYSCTL: SIGHUP</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd reload</code></td>
    <td>Graceful restart of all work processes<br><code>SYSCTL: SIGUSR2</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd reopenlog</code></td>
    <td>Reopen journal<br><code>SYSCTL: SIGUSR1</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd restart</code></td>
    <td>Graceful daemon restart</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd hardrestart</code></td>
    <td>Force-restart daemon</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd status</code></td>
    <td>Show daemon status</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd fullstatus</code></td>
    <td>Show detailed information about daemon</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd configtest</code></td>
    <td>Show global options. The value in parentheses is the default value.</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd log [-n K]</code></td>
    <td>Log output in real time using the command <code>tail -f</code>. With parameter <code>-n K</code> print last K lines. Or use <code>-n +K</code> to output starting with line K.</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd runworker</code></td>
    <td>Starting a workflow without a master process. Used for debugging.</td>
  </tr>
</table>