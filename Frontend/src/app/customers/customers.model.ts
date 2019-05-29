import {Deserializable} from '../shared/mode/deserializable.model';

export class Customer implements Deserializable {
  public id: any;
  public full_name: string;
  public company: string;
  public domain: string;
  public email: string;
  public phone: any;

  constructor() {
  }

  deserialize(input: any) {
    Object.assign(this, input);
    return this;
  }
}
