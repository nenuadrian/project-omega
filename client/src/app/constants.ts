export class Environment {
  public static readonly HOST = document.location.host.indexOf('localhost') === -1 ? document.location.origin : 'http://localhost:8888/storyverse/server/public_html';
}
