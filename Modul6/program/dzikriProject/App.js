import React, {Component} from 'react';
import {
  Container,
  Header,
  Item,
  Content,
  Body,
  Icon,
  Text,
  ListItem,
  Input,
} from 'native-base';

let helperArray = require('./ListNama.json');
export default class GeneralExample extends Component {
  constructor(props) {
    super(props);
    this.state = {
      allUsers: helperArray,
      usersFiltered: helperArray,
    };
  }

  searchUser(textToSearch) {
    this.setState({
      usersFiltered: this.state.allUsers.filter(i =>
        i.name.toLowerCase().includes(textToSearch.toLowerCase()),
      ),
    });
  }

  render() {
    return (
      <Container>
        <Header searchBar rounded>
          <Item>
            <Icon name="search" />
            <Input
              placeholder="Search User"
              onChangeText={text => {
                this.searchUser(text);
              }}
            />
          </Item>
        </Header>
        <Content>
          {this.state.usersFiltered.map(item => (
            <ListItem avatar key={item.id}>
              <Body>
                <Text>{item.name}</Text>
                <Text note>{item.address}</Text>
              </Body>
            </ListItem>
          ))}
        </Content>
      </Container>
    );
  }
}
