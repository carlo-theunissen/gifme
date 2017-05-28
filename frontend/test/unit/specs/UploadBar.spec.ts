import Uploadbar from "../../../src/controllers/UploadBar"
import {} from '@types/chai'

describe('Uploadbar controller', () => {
  it('should start with the waiting state', () => {
    let wait = new Uploadbar();
    chai.assert.isTrue(  wait.state == wait.UploadStates.WAIT_FOR_INPUT);
  });
});
